<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory, HasTranslations, CrudTrait;

    protected $fillable = [
        'title',
        'image',
    ];

    public $translatable = [
        'title'
    ];

    public function setImageAttribute($value): void
    {
        $this->attributes['image'] = Storage::putFile('media', $value, config('filesystems.default'), 'public');
    }
}
