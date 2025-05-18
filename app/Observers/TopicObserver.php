<?php

namespace App\Observers;

use App\Models\Topic;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TopicObserver
{
    public function created(Topic $topic): void
    {
        if ($topic->type === 'fakeNews') {
            $this->createProjectMedia($topic);
        }

        if (in_array($topic->type, ['explainer', 'factSheet'])) {
            $this->createExplainerAndFactSheet($topic);
        }
    }

    private function createExplainerAndFactSheet(Topic $topic): void
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
        if (!$response->successful()) {
            throw new Exception('Failed to create Explainer|FactSheet, description: ' . $response->body());
        }
        $payload = $response->json();
        if (isset($payload['errors'])) {
            throw new Exception('Failed to create Explainer|FactSheet, errors: ' . json_encode($payload['errors']));
        }
    }

    private function createProjectMedia(Topic $topic): void
    {
        $query = <<<'GRAPHQL'
            mutation CreateProjectMedia($input: CreateProjectMediaInput!) {
                createProjectMedia(input: $input) {
                    project_media {
                        id
                        dbid
                        title
                        annotation(annotation_type: "fact_check") {
                            data
                        }
                        tags(first: 10) {
                            edges {
                                node {
                                    tag
                                }
                            }
                        }
                    }
                }
            }
            GRAPHQL;

        $variables = [
            'input' => [
                'url'                   => route('topics.show', $topic->id),
                'set_claim_description' => $topic->title,
                'set_fact_check'        => json_encode([
                    'title'   => $topic->title,
                    'summary' => $topic->chatbot_summary,
                    'url'     => route('topics.show', $topic->id),
                    'status'  => data_get(Topic::FAKE_NEWS_BADGES_MAPPING, $topic->fake_news_badge),
                ]),
                'set_tags'              => json_encode($topic->tags->pluck('name')->toArray()),
                'set_status'            => 'not_applicable',
            ]
        ];

        $response = $this->makeRequest($query, $variables);
        if (!$response->successful()) {
            throw new Exception('FakeNews: Failed to create project media: ' . $response->body());
        }
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
