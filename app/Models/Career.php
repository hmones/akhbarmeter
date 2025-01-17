<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory, HasTranslations, CrudTrait;

    public $translatable = [
        'title',
        'sub_title',
        'type',
        'location',
        'description'
    ];

    const STATUSES = [
        'active'   => 'Active',
        'inactive' => 'Inactive'
    ];

    protected $fillable = [
        'title',
        'sub_title',
        'type',
        'location',
        'description',
        'status'
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }
}
