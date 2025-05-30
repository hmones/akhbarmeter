<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactCheckingMethodology extends Model
{
    use CrudTrait, HasFactory, HasTranslations;

    protected $translatable = ['description'];
    protected $fillable = ['description'];
}
