<?php

namespace App\Console\Commands;

use App\Models\Topic;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CheckMediaCommand extends Command
{
    protected $signature = 'export:topic-to-check-media';
    protected $description = 'temp command to export topic data';

    public function handle(): void
    {
        $exportedIds = Cache::get('exported_topic_ids', []);
        $failedIds = Cache::get('failed_topic_ids', []);

        Topic::where('type', 'fakeNews')
            ->whereNotIn('id', $exportedIds)
            ->chunk(100, function ($topics) use (&$exportedIds, &$failedIds) {
                foreach ($topics as $topic) {
                    if ($this->createProjectMedia($topic)) {
                        $exportedIds[] = $topic->id;
                        Cache::forever('exported_topic_ids', $exportedIds);
                    } else {
                        $failedIds[] = $topic->id;
                        Cache::forever('failed_topic_ids', $failedIds);
                    }
                }
            });

        Topic::whereIn('type', ['explainer', 'factSheet'])
            ->whereNotIn('id', $exportedIds)
            ->chunk(100, function ($topics) use (&$exportedIds, &$failedIds) {
                foreach ($topics as $topic) {
                    if ($this->createExplainerAndFactSheet($topic)) {
                        $exportedIds[] = $topic->id;
                        Cache::forever('exported_topic_ids', $exportedIds);
                    } else {
                        $failedIds[] = $topic->id;
                        Cache::forever('failed_topic_ids', $failedIds);
                    }
                }
            });
    }

    private function createProjectMedia(Topic $topic): bool
    {
        $query = <<<'GRAPHQL'
                mutation CreateProjectMedia($input: CreateProjectMediaInput!) {
                    createProjectMedia(input: $input) {
                        project_media {
                            id
                            full_url
                            claim_description {
                                fact_check {
                                    id
                                    title
                                    summary
                                    url
                                    language
                                }
                            }
                        }
                    }
                }
            GRAPHQL;

        $variables = [
            'input' => [
                'media_type'            => 'Blank',
                'set_claim_description' => $topic->title,
                'set_status'            => data_get(Topic::FAKE_NEWS_BADGES_MAPPING, $topic->fake_news_badge),
                'set_tags'              => $topic->tags->pluck('name')->toArray(),
                'set_fact_check'        => [
                    'title'          => $topic->title,
                    'summary'        => Str::of($topic->chatbot_summary)->stripTags()->toString(),
                    'publish_report' => true,
                    'url'            => route('topics.show', $topic->id)
                ],
            ],
        ];

        $response = $this->makeRequest($query, $variables);
        $success = $response->successful();

        Log::notice('Topic: ' . $topic->id . ' Status: ' . ($success ? 'SUCCESS' : 'FAILED') . ' Response: ' . $response->body());

        return $success;
    }

    private function createExplainerAndFactSheet(Topic $topic): bool
    {
        $query = <<<'GRAPHQL'
        mutation CreateExplainer($input: CreateExplainerInput!) {
            createExplainer(input: $input) {
                explainer {
                    id
                    dbid
                    title
                    description
                    url
                }
            }
        }
        GRAPHQL;

        $variables = [
            'input' => [
                'title'       => $topic->title,
                'tags'        => $topic->tags->pluck('name')->toArray(),
                'description' => $topic->chatbot_summary,
                'url'         => route('topics.show', $topic->id)
            ],
        ];

        $response = $this->makeRequest($query, $variables);
        $success = $response->successful();

        Log::notice('Topic: ' . $topic->id . ' Status: ' . ($success ? 'SUCCESS' : 'FAILED') . ' Response: ' . $response->body());

        return $success;
    }

    private function makeRequest($query, $variables): Response
    {
        return Http::withHeaders([
            'X-Check-Token' => config('check-api.check_api_key'),
            'Content-Type' => 'application/json',
        ])->post('https://check-api.checkmedia.org/api/graphql', [
            'query'     => $query,
            'variables' => $variables,
        ]);
    }
}
