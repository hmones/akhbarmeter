<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Translation extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    public $translatable = ['content'];

    protected static function booted()
    {
        parent::booted();
        static::created(fn () => Cache::forget('translations'));
        static::updated(fn () => Cache::forget('translations'));
    }

    protected $guarded = [];
}
