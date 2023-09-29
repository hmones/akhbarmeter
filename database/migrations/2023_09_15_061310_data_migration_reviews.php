<?php

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Review::truncate();
        $userId = User::where('email', 'dina.ibrahim@akhbarmeter.org')->first()?->id ?? User::first()?->id;
        $selectQuery = DB::raw("select r.id, r.comment, r.comment_ext as comment_external, '$userId' as user_id, r.article_id, a.score_1, a.score_2, a.score_3, r.score, r.created_at, r.updated_at from cairo_mediameter_reviews as r
LEFT JOIN cairo_mediameter_articles as a on r.article_id = a.id;");
        collect(DB::select($selectQuery))->chunk(500)->each(function ($chunk, $key) {
            try {
                DB::table('reviews')->insert(json_decode($chunk->toJson(), true));
            } catch (Exception $exception) {
                echo str($exception->getMessage())->limit(1000);
            }
        });
    }

    public function down(): void
    {
        Review::truncate();
    }
};
