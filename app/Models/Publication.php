<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        $this->attributes['image'] = Storage::putFile('v3.0/publication/image', $value, 'public');
    }

    public function setAuthorAvatarAttribute($value): void
    {
        $this->attributes['author_avatar'] = Storage::putFile('v3.0/publication/author_avatar', $value, 'public');
    }

    public function setFileAttribute($value): void
    {
        $this->attributes['file'] = Storage::putFile('v3.0/publication/file', $value, 'public');
    }
}
