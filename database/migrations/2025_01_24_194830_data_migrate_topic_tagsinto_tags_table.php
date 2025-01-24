<?php

use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Topic::whereJsonLength('tags', '>', 0)
            ->lazyById()
            ->each(function ($topic) {
                collect(json_decode($topic->tags, true))->each(function ($tag) use ($topic) {
                    $tag = Tag::firstOrCreate(['name' => trim(data_get($tag, 'value'))]);
                    $topic->tags()->attach($tag->id);
                });
            });
    }
};
