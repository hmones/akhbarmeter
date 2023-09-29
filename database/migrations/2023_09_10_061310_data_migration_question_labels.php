<?php

use App\Helpers\TranslationDataMigrationHelper;
use App\Models\ArticleTopic;
use App\Models\ArticleType;
use App\Models\QuestionLabel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        QuestionLabel::truncate();
        $labels = DB::table('cairo_mediameter_label')->get();
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Label');
            $records = $labels->map(fn($record) => [
                'id' => $record->id,
                'title' => json_encode(['ar' => $record->name, 'en' => $translationHelper->getEnglishTranslation($record->id, 'name')]),
                'color' => $record->color,
                'icon' => $record->icon,
                'priority' => $record->priority,
                'created_at' => $record->created_at,
                'updated_at' => $record->updated_at,
            ])->toArray();
            DB::table('question_labels')->insert($records);
    }

    public function down(): void
    {
        QuestionLabel::truncate();
    }
};
