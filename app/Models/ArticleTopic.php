<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleTopic extends Model
{
    use HasFactory;
    use HasTranslations;
    use CrudTrait;

    public $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'icon',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'topic_id');
    }
}
