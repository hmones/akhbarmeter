<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    use HasFactory;
    use HasTranslations;
    use CrudTrait;

    const WEIGHTS = [0, 1];
    const NO_MISTAKE = 1;
    const MISTAKE = 0;

    public $translatable = [
        'title',
        'description'
    ];
    protected $fillable = [
        'question_id',
        'title',
        'description',
        'weight',
        'selected',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
