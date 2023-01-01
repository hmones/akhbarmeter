<?php

namespace App\Repositories;

use App\Models\Publisher;
use App\Models\PublisherScore;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class StatisticsRepository
{
    public function getPublisherYearScoreByMonth(Publisher $publisher): Collection
    {
        $scores = [];

        $monthlyScores = $publisher->scores()
            ->wherePeriod(PublisherScore::PERIOD_MONTH)
            ->whereBetween('to', [now()->subYear()->firstOfYear(), now()->firstOfYear()])
            ->get();

        foreach (range(0, 11) as $count) {
            $month = now()->subYear()->firstOfYear()->addMonths($count);
            $monthlyScore =  $monthlyScores->whereBetween('to', [
                $month->startOfMonth()->format('Y-m-d h:m:i'),
                $month->endOfMonth()->format('Y-m-d h:m:i')
            ])->first();

            array_push($scores, [
                'score'   => $monthlyScore?->score ?? 100,
                'score_1' => $monthlyScore?->score_1 ?? 100,
                'score_2' => $monthlyScore?->score_2 ?? 100,
                'score_3' => $monthlyScore?->score_3 ?? 100,
            ]);
        }

        return collect($scores);
    }
}
