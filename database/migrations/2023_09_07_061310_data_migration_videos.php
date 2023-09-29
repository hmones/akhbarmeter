<?php

use App\Helpers\TranslationDataMigrationHelper;
use App\Models\Video;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up(): void
    {
        Video::truncate();
        $videos = DB::table('cairo_mediameter_videos')->get();
        $translationHelper = new TranslationDataMigrationHelper('Cairo\\MediaMeter\\Models\\Video');
        $records = $videos->map(fn($video) => [
            'id' => $video->id,
            'url' => Str::of($video->link)->replace("watch?v=", "embed/"),
            'tags' => Str::of($video->tags)->split("/,|،|#/")->map(fn ($tag) => trim($tag))->filter()->map(fn($tag) => ['value' => $tag ])->toJson(),
            'title' => json_encode(['ar' => $video->title, 'en' => $translationHelper->getEnglishTranslation($video->id, 'title')]),
            'description' => json_encode(['ar' => $video->description, 'en' => $translationHelper->getEnglishTranslation($video->id, 'description')]),
            'created_at' => $video->created_at,
            'updated_at' => $video->updated_at,
        ])->toArray();
        DB::table('videos')->insert($records);
    }

    public function down(): void
    {
        Video::truncate();
    }
};
