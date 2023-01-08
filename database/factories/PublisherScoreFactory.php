<?php

namespace Database\Factories;

use App\Models\PublisherScore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PublisherScoreFactory extends Factory
{
    public function definition(): array
    {
        $period = fake()->randomElement([
            PublisherScore::PERIOD_WEEK,
            PublisherScore::PERIOD_MONTH,
            PublisherScore::PERIOD_YEAR
        ]);

        return [
            'from'           => $this->getPeriodFromDate($period),
            'to'             => now(),
            'period'         => $period,
            'articles_count' => fake()->randomNumber(2),
            'score_1'        => fake()->numberBetween(0, 100),
            'score_2'        => fake()->numberBetween(0, 100),
            'score_3'        => fake()->numberBetween(0, 100),
            'score'          => fake()->numberBetween(0, 100),
            'rank'           => fake()->numberBetween(1, 10),
            'is_trending'    => fake()->boolean,
        ];
    }

    protected function getPeriodFromDate(string $period): Carbon
    {
        return match ($period) {
            PublisherScore::PERIOD_WEEK => now()->startOfDay()->subWeek(),
            PublisherScore::PERIOD_MONTH => now()->startOfDay()->subMonth(),
            default => now()->startOfDay()->subYear()
        };
    }

    public function week(): Factory
    {
        return $this->state(fn(array $attributes) => ['from'   => now()->startOfDay()->subWeek(),
                                                      'period' => PublisherScore::PERIOD_WEEK]);
    }

    public function month(): Factory
    {
        return $this->state(fn(array $attributes) => ['from'   => now()->startOfDay()->subMonth(),
                                                      'period' => PublisherScore::PERIOD_MONTH]);
    }

    public function year(): Factory
    {
        return $this->state(fn(array $attributes) => ['from'   => now()->startOfDay()->subYear(),
                                                      'period' => PublisherScore::PERIOD_YEAR]);
    }
}
