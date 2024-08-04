<?php

namespace App\Jobs;

use App\Exceptions\InvalidEnumValueException;
use App\Models\Publisher;
use App\Models\PublisherScore;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class CalculateRankForPublishers implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Carbon $startDate;

    public function __construct(Carbon $startDate, protected string $period)
    {
        $this->startDate = $startDate->startOfDay();
    }

    public function handle(): void
    {
        PublisherScore::whereFrom($this->startDate)->wherePeriod($this->period)->delete();
        $duration = $this->getPeriod();
        $publishers = Publisher::whereActive(1)->get();
        $publisherScores = collect();

        foreach ($publishers as $publisher) {
            $articles = $publisher->articles()
                ->whereActive(1)
                ->has('review')
                ->whereBetween('created_at', $duration)
                ->with('review')
                ->get();
            $previousPeriodScore = PublisherScore::wherePeriod($this->period)->latest()->first()?->score ?? 0;
            $currentScore = $articles->count() ? (int) $articles->average('review.score') : 100;

            $publisherScores->push([
                'publisher_id' => $publisher->id,
                'from' => Arr::first($duration),
                'to' => Arr::last($duration),
                'period' => $this->period,
                'articles_count' => $articles->count(),
                'score_1' => $articles->count() ? (int) $articles->average('review.score_1') : 100,
                'score_2' => $articles->count() ? (int) $articles->average('review.score_2') : 100,
                'score_3' => $articles->count() ? (int) $articles->average('review.score_3') : 100,
                'score' => $currentScore,
                'is_trending' => $currentScore > $previousPeriodScore,
                'created_at' => now(),
            ]);
        }

        $publisherScores = $publisherScores
            ->sortByDesc('score')
            ->values()
            ->map(fn ($record, $key) => array_merge($record, ['rank' => $key + 1]))
            ->toArray();

        PublisherScore::insert($publisherScores);
    }

    protected function getPeriod(): array|Exception
    {
        return match ($this->period) {
            PublisherScore::PERIOD_WEEK => [$this->startDate, $this->startDate->copy()->addWeek()],
            PublisherScore::PERIOD_MONTH => [$this->startDate, $this->startDate->copy()->addMonth()],
            PublisherScore::PERIOD_YEAR => [$this->startDate, $this->startDate->copy()->addYear()],
            default => throw new InvalidEnumValueException("Invalid period passed to the job $this->period")
        };
    }
}
