<?php

use App\Helpers\FilesDataMigrationHelper;
use App\Helpers\TranslationDataMigrationHelper;
use App\Models\Publication;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Publication::truncate();
        $publications = DB::table('cairo_mediameter_pubs')->get();
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Publication');
        $fileHelper = new FilesDataMigrationHelper('Cairo\\MediaMeter\\Models\\Publication');
        $records = $publications->map(fn($record) => [
            'id' => $record->id,
            'title' => json_encode(['ar' => $record->name, 'en' => $translationHelper->getEnglishTranslation($record->id, 'name')]),
            'description' => json_encode(['ar' => $record->desc, 'en' => $translationHelper->getEnglishTranslation($record->id, 'desc')]),
            'file' => $fileHelper->getFile($record->id, 'pub'),
            'image' => $fileHelper->getFile($record->id, 'poster'),
            'author_name' => 'AkhbarMeter',
            'min_to_read' => 7,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
        ])->toArray();
        DB::table('publications')->insert($records);
    }

    public function down(): void
    {
        Publication::truncate();
    }
};
