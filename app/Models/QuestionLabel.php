<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionLabel extends Model
{
    use HasFactory;
    use HasTranslations;
    use CrudTrait;

    const COLORS = [
        'red'    => 'Red',
        'orange' => 'Orange',
        'yellow' => 'Yellow'
    ];
    public $translatable = [
        'title',
    ];
    protected $fillable = [
        'title',
        'icon',
        'color',
        'priority',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
