<?php


namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    const PAGINATION_ITEMS = 3;

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
            $query->whereJsonContains('tags', ['value' => data_get($params, 'tag')]);
        }
    }

    public function setImageAttribute($value): void
    {
        $this->uploadFileToDisk($value, 'image', config('filesystems.default'), "topic/image");
    }

    public function setAuthorAvatarAttribute($value): void
    {
        $this->uploadFileToDisk($value, 'author_avatar', config('filesystems.default'), "topic/author_avatar");
    }
}
