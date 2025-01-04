<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use CrudTrait, HasFactory, HasTranslations;

    protected $fillable = [
        'first_name',
        'last_name',
        'job_title',
        'bio',
        'image',
        'linked_in',
        'email',
    ];

    public $translatable = [
        'job_title',
        'bio'
    ];
}
