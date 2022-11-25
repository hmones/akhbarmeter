<?php


namespace App\Models;

use App\Constants\InputFields;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends TranslatableModel
{
    use HasFactory;

    const TYPES = [
        'violations'   => 'Violations',
        'fakeNews'     => 'Fake News',
        'codeOfEthics' => 'Code of Ethics'
    ];

    public $translatable = [
        'title',
        'description'
    ];

    public $editableFields = [
        'title'         => InputFields::TEXT,
        'description'   => InputFields::RICH_TEXT,
        'image'         => InputFields::IMAGE,
        'tags'          => InputFields::TAGS,
        'type'          => InputFields::DROPDOWN,
        'author_name'   => InputFields::TEXT,
        'author_avatar' => InputFields::IMAGE,
    ];

    public $dropdownValues = [
        'type' => self::TYPES
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
