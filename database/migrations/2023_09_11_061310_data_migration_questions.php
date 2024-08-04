<?php

use App\Helpers\TranslationDataMigrationHelper;
use App\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Question::truncate();
        $questions = DB::table('cairo_mediameter_questions')->get();
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Question');
        $records = $questions->map(fn ($record, $key) => [
            'id' => $record->id,
            'title' => json_encode(['ar' => $record->question, 'en' => $translationHelper->getEnglishTranslation($record->id, 'question')]),
            'description' => json_encode(['ar' => $record->desc, 'en' => '']),
            'hint' => json_encode(['ar' => $record->hint, 'en' => '']),
            'weight' => $record->weight,
            'label_id' => $record->label_id,
            'active' => $record->active,
            'order' => $key + 1,
            'created_at' => $record->created_at ?? now(),
            'updated_at' => $record->updated_at ?? now(),
        ])->toArray();
        DB::table('questions')->insert($records);
    }

    public function down(): void
    {
        Question::truncate();
    }
};
