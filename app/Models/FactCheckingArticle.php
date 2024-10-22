<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactCheckingArticle extends Model
{
    use HasFactory;
    use HasTranslations;
    use CrudTrait;

    protected $translatable = [
        'claim_description',
        'title',
        'summary',
    ];

    protected $fillable = [
        'dbid',
        'claim_description',
        'title',
        'summary',
    ];
}
