<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $editableFields = [
        'title'       => 'text',
        'url'         => 'text',
        'description' => 'rich',
        'tags'        => 'tags',
        'icon'        => 'text'
    ];

    protected $fillable = [
        'title',
        'url',
        'description',
        'tags',
        'icon'
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
