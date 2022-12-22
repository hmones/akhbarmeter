<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SebastianBergmann\LinesOfCode\Counter;

class PublisherScore extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
