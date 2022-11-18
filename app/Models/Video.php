<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Video extends TranslatableModel
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'description'
    ];

    public $editableFields = [
        'title'       => 'text',
        'url'         => 'text',
        'description' => 'rich',
        'tags'        => 'tags',
        'icon'        => 'text'
    ];

    protected $fillable = [
        'title',
        'url',
        'description',
        'tags',
        'icon'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function scopeFilter(Builder $query, $params): void
    {
        if (data_get($params, 'tag', false)) {
            $query->whereJsonContains('tags', data_get($params, 'tag'));
        }
    }
}
