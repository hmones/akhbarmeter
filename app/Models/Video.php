<?php

namespace App\Models;

use App\Constants\InputFields;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends TranslatableModel
{
    use HasFactory;

    public $translatable = [
        'title',
        'description'
    ];

    public $editableFields = [
        'title'       => InputFields::TEXT,
        'url'         => InputFields::TEXT,
        'description' => InputFields::RICH_TEXT,
        'tags'        => InputFields::TAGS,
        'icon'        => InputFields::TEXT
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
