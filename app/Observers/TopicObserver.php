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
        if ($topic->type === data_get(Topic::TYPES, 'fakeNews')) {
            $claimDescriptionId = $this->createClaimDescription($topic);
            $this->createClaimFactCheck($claimDescriptionId, $topic);
        }

        if (in_array($topic->type, [data_get(Topic::TYPES, 'explainer'), data_get(Topic::TYPES, 'factSheet')])) {
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
                'title'   => $topic->title,
                'tags'    => $topic->tags->pluck('name')->toArray(),
                'description' => $topic->chatbot_summary,
                'url'     => route('topics.show', $topic->id)
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

    private function createClaimDescription(Topic $topic): int
    {
        $query = <<<'GRAPHQL'
        mutation CreateClaimDescription($input: CreateClaimDescriptionInput!) {
            createClaimDescription(input: $input) {
                claim_description {
                    id
                    description
                }
            }
        }
        GRAPHQL;

        $variables = [
            'input' => [
                'description' => $topic->title
            ],
        ];

        $response = $this->makeRequest($query, $variables);
        if (!$response->successful()) {
            throw new Exception('Failed to create claim description: ' . $response->body());
        }
        $payload = $response->json();
        if (isset($payload['errors'])) {
            throw new Exception('GraphQL errors: ' . json_encode($payload['errors']));
        }

        return $this->decodeAndGetId(data_get($payload, 'data.createClaimDescription.claim_description.id'));

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

    private function decodeAndGetId(string $claimDescriptionId): int
    {
        $claimDescriptionId = str_replace(["\n", "\r", "\t"], '', trim($claimDescriptionId));
        $decodedClaimDescriptionId = base64_decode($claimDescriptionId, true);
        if ($decodedClaimDescriptionId === false) {
            Log::error('Base64 decode failed', ['claimDescriptionId' => false]);
            throw new Exception('Failed to decode claimDescriptionId ID: ' . $claimDescriptionId);
        }

        $parts = explode('/', $decodedClaimDescriptionId);
        if (count($parts) !== 2 || $parts[0] !== 'ClaimDescription') {
            throw new Exception('Invalid global ID format: ' . $decodedClaimDescriptionId);
        }

        $claimDescriptionId = (int) $parts[1];
        if ($claimDescriptionId <= 0) {
            throw new Exception('Invalid ID extracted from global ID: ' . $parts[1]);
        }

        return $claimDescriptionId;
    }

    private function createClaimFactCheck(int $claimDescriptionId, Topic $topic): void
    {
        $variables = [
            'input' => [
                'claim_description_id' => $claimDescriptionId,
                'title'   => $topic->title,
                'tags'    => $topic->tags->pluck('name')->toArray(),
                'summary' => $topic->chatbot_summary,
                'url'     => route('topics.show', $topic->id)
            ],
        ];

        $query = <<<'GRAPHQL'
        mutation CreateFactCheck($input: CreateFactCheckInput!) {
            createFactCheck(input: $input) {
                fact_check {
                    id
                    title
                    summary
                    url
                }
            }
        }
        GRAPHQL;

        $response = $this->makeRequest($query, $variables);
        if ($response->failed()) {
            Log::error('Check API error', [
                'response' => $response->body(),
                'status'   => $response->status(),
                'topic_id' => $topic->id
            ]);
        }

        Log::notice('Claim fact check created', [
            'topic_id' => $topic->id,
            'response' => $response->body()
        ]);
    }
}
