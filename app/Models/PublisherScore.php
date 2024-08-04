<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PublisherScore extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    const TRENDING = 1;

    const NOT_TRENDING = 0;

    const PERIOD_WEEK = 'week';

    const PERIOD_MONTH = 'month';

    const PERIOD_YEAR = 'year';

    protected $guarded = [];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->wherePeriod(PublisherScore::PERIOD_WEEK)->orderBy('to', 'desc');
    }

    public function scopeLastMonth(Builder $query): Builder
    {
        return $query->wherePeriod(PublisherScore::PERIOD_MONTH)->orderBy('to', 'desc');
    }
}
