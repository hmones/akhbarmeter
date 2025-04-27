<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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
        'active'
    ];

    public $translatable = [
        'job_title',
        'bio'
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }


    public function setImageAttribute($value): void
    {
        $this->attributes['image'] = Storage::putFile('teamMember', $value, 'public');
    }
}
