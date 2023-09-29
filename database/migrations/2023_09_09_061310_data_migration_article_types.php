<?php

use App\Helpers\TranslationDataMigrationHelper;
use App\Models\ArticleTopic;
use App\Models\ArticleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        ArticleType::truncate();
        ArticleTopic::truncate();
        $categories = DB::table('cairo_mediameter_categories')->get()->groupBy('cat_type');
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Category');
        foreach ($categories as $key => $category) {
            $records = $category->map(fn($record) => [
                'id' => $record->id,
                'title' => json_encode(['ar' => $record->cat_title, 'en' => $translationHelper->getEnglishTranslation($record->id, 'cat_title')]),
                'description' => json_encode(['ar' => $record->cat_desc, 'en' => $translationHelper->getEnglishTranslation($record->id, 'cat_desc')]),
                'icon' => $record->cat_icon,
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray();
            DB::table($key == 'topic' ? 'article_topics' : 'article_types')->insert($records);
        }
    }

    public function down(): void
    {
        ArticleTopic::truncate();
        ArticleType::truncate();
    }
};
