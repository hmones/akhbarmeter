<?php

use App\Helpers\FilesDataMigrationHelper;
use App\Helpers\TranslationDataMigrationHelper;
use App\Models\Publisher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Publisher::truncate();
        $publishers = DB::table('cairo_mediameter_publishers')->get();
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Publisher');
        $fileHelper = new FilesDataMigrationHelper('Cairo\\MediaMeter\\Models\\Publisher');
        $records = $publishers->map(fn($record) => [
            'id' => $record->id,
            'name' => $translationHelper->getTranslatedField($record, 'name'),
            'slug' => $record->slug,
            'description' => $translationHelper->getTranslatedField($record, 'description'),
            'url' => $record->url,
            'image' => $fileHelper->getFile($record->id, 'logo'),
            'active' => $record->published,
            'hashtags' => $record->hashtags,
            'title_xpath' => $record->title_xpath,
            'content_xpath' => $record->content_xpath,
            'image_xpath' => $record->image_xpath,
            'author_xpath' => $record->auther_xpath,
            'created_at' => $record->created_at ?? now(),
            'updated_at' => $record->updated_at ?? now(),
        ])->toArray();
        DB::table('publishers')->insert($records);
    }

    public function down(): void
    {
        Publisher::truncate();
    }
};
