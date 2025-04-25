<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use CrudTrait, HasTranslations;

    protected $translatable = ['description'];
    protected $fillable = ['description'];
}
