<?php

use App\Helpers\FilesDataMigrationHelper;
use App\Helpers\TranslationDataMigrationHelper;
use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Topic::truncate();
        $types = [
            'انتهاكات إعلامية'   => 'violations',
            'خبر غير حقيقي'     => 'fakeNews',
            'قواعد المهنية الإعلامية' => 'codeOfEthics'
        ];
        $topics = DB::table('rainlab_blog_posts')->get();
        $categories = DB::table('rainlab_blog_categories')->get();
        $topicsCategories = DB::table('rainlab_blog_posts_categories')->get();
        $translationHelper = new TranslationDataMigrationHelper('RainLab\\Blog\\Models\\Post');
        $fileHelper = new FilesDataMigrationHelper('RainLab\\Blog\\Models\\Post');
        $typesIds = $categories->whereIn('name', array_keys($types))
            ->pluck('name', 'id')
            ->map(fn ($record) => data_get($types, $record))
            ->toArray();
        $records = $topics->map(fn($record) => [
            'id' => $record->id,
            'title' => $translationHelper->getTranslatedField($record, 'title'),
            'slug' => $record->slug,
            'description' => $translationHelper->getTranslatedField($record, 'content_html'),
            'image' => $fileHelper->getFile($record->id, 'featured_images'),
            'tags' => $this->getCategories($record->id, $categories, $topicsCategories),
            'author_name' => 'AkhbarMeter',
            'type' => $this->getType($record->id, $typesIds, $topicsCategories),
            'active' => $record->published,
            'created_at' => $record->created_at ?? now(),
            'updated_at' => $record->updated_at ?? now(),
            'published_at' => $record->published_at ?? now(),
        ])->toArray();
        DB::table('topics')->insert($records);
    }

    public function down(): void
    {
        Topic::truncate();
    }

    protected function getCategories(int $id, Collection $categories, Collection $topicsCategories)
    {
        return $topicsCategories
            ->where('post_id', $id)
            ->pluck('category_id')
            ->map(fn ($id) => ['value' => $categories->where('id', $id)->first()?->name])
            ->toJson();
    }

    protected function getType(int $id, array $typesIds, Collection $topicsCategories): string
    {
        return $topicsCategories
            ->where('post_id', $id)
            ->map(fn ($category) => data_get($typesIds, $category->category_id))
            ->filter()
            ->first() ?: 'other';
    }
};
