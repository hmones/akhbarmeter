<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;

class Topic extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    const PAGINATION_ITEMS = 3;

    const FAKE_NEWS = 'fakeNews';

    const TYPES = [
        'violations'           => 'Violations',
        'fakeNews'             => 'Fake News',
        'codeOfEthics'         => 'Code of Ethics',
        'factSheet'            => 'Factsheet',
        'explainer'            => 'Explainer',
        'akhbarMeterWorkshops' => 'AkhbarMeter workshops',
        'akhbarMeterInMedia'   => 'AkhbarMeter in Media',
        'mediaAnalysisReports' => 'Media analysis reports',
        'other'                => 'Other'
    ];

    const SUB_TYPES = [
        'factSheetOnGender'        => 'Factsheet on Gender',
        'factSheetOnClimateChange' => 'Factsheet on Climate Change',
        'explainerOnGender'        => 'Explainer on Gender',
        'explainerOnClimateChange' => 'Explainer on Climate Change',
        'fakeNewsOnGender'         => 'Fake News on Gender',
        'fakeNewsOnClimateChange'  => 'Fake News on Climate Change'
    ];

    const FAKE_NEWS_SUB_TYPES = [
        'fakeNewsOnGender'        => 'Fake News on Gender',
        'fakeNewsOnClimateChange' => 'Fake News on Climate Change'
    ];

    const FAKE_NEWS_BADGES = [
        'notTrue'           => 'Not Ture',
        'halfTrue'          => 'Half True',
        'misleadingContext' => 'Misleading Context',
        'unproven'          => 'Unproven',
        'true'              => 'True'
    ];

    const FAKE_NEWS_BADGES_MAPPING = [
        'notTrue'           => 'false',
        'halfTrue'          => 'in_progress',
        'misleadingContext' => 'not_applicable',
        'unproven'          => 'undetermined',
        'true'              => 'verified'
    ];

    public $translatable = [
        'title',
        'sub_title',
        'description',
        'brief_description_summary',
        'chatbot_summary',
        'conclusion'
    ];

    protected $fillable = [
        'team_member_id',
        'title',
        'sub_title',
        'slug',
        'chatbot_summary',
        'description',
        'brief_description_summary',
        'image',
        'claim_reference',
        'fact_check_reference',
        'conclusion',
        'image',
        'author_name',
        'author_avatar',
        'type',
        'sub_type',
        'fake_news_badge',
        'published_at',
        'active'
    ];

    protected $casts = [
        'claim_reference'      => 'array',
        'fact_check_reference' => 'array',
        'published_at'         => 'datetime'
    ];

    public function teamMember(): BelongsTo
    {
        return $this->belongsTo(TeamMember::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
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

    public static function getTopTagsByType(string $cacheKey, ?string $topicType = null, int $limit = 20): Collection
    {
        return cache()->remember($cacheKey, 86400, function () use ($topicType, $limit) {
            $query = Tag::query()
                ->select('tags.name')
                ->distinct()
                ->when($topicType, function ($query) use ($topicType) {
                    $query->whereHas('topics', function ($query) use ($topicType) {
                        $query->where('type', $topicType);
                    });
                }, function ($query) {
                    $query->whereHas('topics', function ($query) {
                        $query->where('type', '!=', Topic::FAKE_NEWS);
                    });
                })
                ->limit($limit);

            return $query->get();
        });
    }
}
