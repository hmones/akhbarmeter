<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    public $translatable = ['content'];

    protected static function booted(): void
    {
        parent::booted();
        static::created(fn () => self::cacheTranslations());
        static::updated(fn () => self::cacheTranslations());
    }

    protected static function cacheTranslations(): void
    {
        cache()->forget('translations');
        cache()->rememberForever('translations', fn () => Translation::all());
    }

    protected $guarded = [];
}
