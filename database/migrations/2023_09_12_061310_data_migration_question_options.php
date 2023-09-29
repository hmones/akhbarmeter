<?php

use App\Helpers\TranslationDataMigrationHelper;
use App\Models\QuestionOption;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        QuestionOption::truncate();
        $options = DB::table('cairo_mediameter_options')->get();
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Option');
        $records = $options->map(fn($record) => [
            'id' => $record->id,
            'question_id' => $record->question_id,
            'title' => $translationHelper->getTranslatedField($record, 'option'),
            'description' => $translationHelper->getTransArray($record->desc ?? "", ''),
            'weight' => !$record->weight,
            'selected' => $record->selected,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
            'is_not_applicable' => $record->code == 'na' ? 1 : 0
        ])->toArray();
        DB::table('question_options')->insert($records);
    }

    public function down(): void
    {
        QuestionOption::truncate();
    }
};
