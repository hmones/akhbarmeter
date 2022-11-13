<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Video extends Model
{
    use HasFactory, Translatable;

    protected $casts = [
        'tags' => 'array',
    ];

    public function setTagsAttribute($value)
    {
        $value = is_string($value) ? json_decode($value, true) : $value;

        $this->attributes['tags'] = json_encode(empty($value) ? array() : $value);
    }
}
