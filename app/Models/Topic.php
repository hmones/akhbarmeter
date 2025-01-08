<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Topic extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    const PAGINATION_ITEMS = 3;

    const FAKE_NEWS = 'fakeNews';

    const TYPES = [
        'violations' => 'Violations',
        'fakeNews' => 'Fake News',
        'codeOfEthics' => 'Code of Ethics',
        'other' => 'Other',
    ];

    public $translatable = [
        'title',
        'sub_title',
        'description',
        'legal_statement',
        'correction_statement'
    ];

    protected $fillable = [
        'team_member_id',
        'title',
        'sub_title',
        'slug',
        'description',
        'claim_reference',
        'fact_check_reference',
        'legal_statement',
        'correction_statement',
        'image',
        'tags',
        'author_name',
        'author_avatar',
        'type',
        'published_at',
        'active',
    ];

    protected $casts = [
        'tags'                 => 'array',
        'claim_reference'      => 'array',
        'fact_check_reference' => 'array',
        'published_at'         => 'datetime'
    ];

    public function teamMember(): BelongsTo
    {
        return $this->belongsTo(TeamMember::class);
    }
    public function scopeFilter(Builder $query, $params): void
    {
        if (data_get($params, 'tag', false)) {
            $query->whereJsonContains('tags', ['value' => data_get($params, 'tag')]);
        }
    }

    public function scopeFake(Builder $query): void
    {
        $query->whereType(self::FAKE_NEWS);
    }

    public function setImageAttribute($value): void
    {
        $this->attributes['image'] = Storage::putFile('v3.0/topic/image', $value, 'public');
    }

    public function setAuthorAvatarAttribute($value): void
    {
        $this->attributes['image'] = Storage::putFile('v3.0/topic/author_avatar', $value, 'public');
    }

    public function resolveRouteBinding($value, $field = null): self
    {
        return $this->where('id', $value)->orWhere('slug', $value)->firstOrFail();
    }
}
