<?php

use App\Helpers\FilesDataMigrationHelper;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Article::truncate();
        $selectQuery = DB::raw("SELECT a.id,
               a.url,
               a.title,
               a.date,
               a.content,
               a.auther,
               a.comment,
               a.active,
               a.publisher_id,
               a.fake,
               a.score_at,
               a.fetched_at,
               a.created_at,
               a.updated_at,
               types.category_id  as type_id,
               topics.category_id as topic_id
from cairo_mediameter_articles as a
         LEFT JOIN cairo_mediameter_art_cat as types on a.id = types.article_id AND types.category_id in (select categories1.id
                                                                                                          from cairo_mediameter_categories as categories1
                                                                                                          where categories1.cat_type = 'type')
         LEFT JOIN cairo_mediameter_art_cat as topics on a.id = topics.article_id AND topics.category_id in (select categories2.id
                                                                                                           from cairo_mediameter_categories as categories2
                                                                                                           where categories2.cat_type = 'topic')");

        $userId = User::where('email', 'dina.ibrahim@akhbarmeter.org')->first()?->id;
        $fileHelper = new FilesDataMigrationHelper('Cairo\\MediaMeter\\Models\\Article');
        $articles = collect(DB::select($selectQuery))->unique('id');
        $total = ceil($articles->count() / 1000);
        $articles->chunk(1000)->each(function ($chunk, $key) use ($fileHelper, $userId, $total) {
            $index = $key + 1;
            $startTime = now();
            echo "\n$startTime: Starting to migrate chunk $index of $total (1000 articles each)";
            $temp = $chunk->map(fn($record) => [
                'id' => $record->id,
                'url' => $record->url,
                'title' => $record->title,
                'date' => $record->date,
                'image' => $fileHelper->getFile($record->id, 'photos'),
                'content' => $record->content,
                'author' => $record->auther,
                'comment' => $record->comment,
                'active' => $record->active,
                'publisher_id' => $record->publisher_id,
                'user_id' => $userId,
                'type_id' => $record->type_id,
                'topic_id' => $record->topic_id,
                'is_fake' => $record->fake,
                'score_at' => $record->score_at,
                'fetched_at' => $record->fetched_at,
                'created_at' => $record->created_at,
                'updated_at' => $record->updated_at,
            ])->toArray();
            try {
                DB::table('articles')->insert($temp);
            } catch (Exception $exception) {
                echo "Error in migrating batch number $index:" . str($exception->getMessage())->limit(1000);
            }
        });
    }

    public function down(): void
    {
        Article::truncate();
    }
};
