<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Publisher extends Model
{
    use HasFactory;
    use CrudTrait;
    use HasTranslations;

    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'slug',
        'name',
        'description',
        'url',
        'image',
        'active',
        'hashtags',
        'title_xpath',
        'content_xpath',
        'image_xpath',
        'author_xpath',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function scores(): HasMany
    {
        return $this->hasMany(PublisherScore::class);
    }

    public function setImageAttribute($value): void
    {
        $this->attributes['image'] = Storage::putFile('v3.0/publisher/image', $value, 'public');
    }
}
