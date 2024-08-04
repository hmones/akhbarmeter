<?php

use App\Models\PublisherScore;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        PublisherScore::truncate();
        $monthlyScores = DB::table('cairo_mediameter_pscores')->where('score_period', 'month')->orderBy('score_from', 'desc')->orderBy('score_percent', 'desc')->get()->groupBy('score_from');

        $monthlyScores->each(function ($period) {
            $scores = $period->map(fn ($score, $key) => [
                'id' => $score->id,
                'publisher_id' => $score->publisher_id,
                'from' => $score->score_from,
                'to' => $score->score_to,
                'period' => $score->score_period,
                'articles_count' => $score->num_articles,
                'score_1' => $score->score_1,
                'score_2' => $score->score_2,
                'score_3' => $score->score_3,
                'score' => $score->score_percent,
                'rank' => $key + 1,
                'is_trending' => 1,
                'created_at' => $score->created_at,
                'updated_at' => $score->updated_at,
            ])->toArray();
            DB::table('publisher_scores')->insert($scores);
        });
    }

    public function down(): void
    {
        PublisherScore::truncate();
    }
};
