<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends TranslatableModel
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'description'
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
