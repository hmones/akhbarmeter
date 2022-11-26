<?php


namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends TranslatableModel
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    const TYPES = [
        'violations'   => 'Violations',
        'fakeNews'     => 'Fake News',
        'codeOfEthics' => 'Code of Ethics'
    ];

    public $translatable = [
        'title',
        'description'
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'tags',
        'author_name',
        'author_avatar',
        'type'
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
