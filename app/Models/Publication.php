<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    use CrudTrait;
    use HasTranslations;

    public $translatable = [
        'title',
        'description'
    ];

    protected $guarded = [];

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
        $this->uploadFileToDisk($value, 'image', config('filesystems.default'), "publication/image");
    }

    public function setAuthorAvatarAttribute($value): void
    {
        $this->uploadFileToDisk($value, 'author_avatar', config('filesystems.default'), "publication/author_avatar");
    }

    public function setFileAttribute($value): void
    {
        $this->uploadFileToDisk($value, 'file', config('filesystems.default'), "publication/file");
    }
}
