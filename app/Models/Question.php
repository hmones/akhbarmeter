<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    use HasTranslations;
    use CrudTrait;

    const WEIGHTS = [1, 2, 3];

    const PROFESSIONALISM_WEIGHT = 1;

    const CREDIBILITY_WEIGHT = 2;

    const HUMAN_RIGHTS_WEIGHT = 3;

    public $translatable = [
        'title',
        'description',
        'hint',
    ];

    protected $fillable = [
        'title',
        'description',
        'hint',
        'weight',
        'label_id',
        'active',
        'order',
    ];

    public function label(): BelongsTo
    {
        return $this->belongsTo(QuestionLabel::class, 'label_id');
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }
}
