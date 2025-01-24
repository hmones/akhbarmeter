<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory, CrudTrait;

    protected $fillable = ['name'];

    public function taggables(): MorphToMany
    {
        return $this->morphedByMany(Taggable::class, 'taggable');
    }
}
