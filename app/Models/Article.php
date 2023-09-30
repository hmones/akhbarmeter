<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'url',
        'title',
        'date',
        'image',
        'content',
        'author',
        'comment',
        'active',
        'publisher_id',
        'user_id',
        'type_id',
        'topic_id',
        'is_fake',
        'fetched_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(ArticleTopic::class, 'topic_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ArticleType::class, 'type_id');
    }

    public function setImageAttribute($value): void
    {
        $this->attributes['image'] = Storage::putFile('v3.0/article/image', $value, 'public');
    }

    public function updatePublisher(): ?Publisher
    {
        $url = new Uri($this->url);

        $publisher = Publisher::where('url', 'like', '%' . $url->getHost() . '%')->first();

        if ($publisher) {
            $this->publisher_id = $publisher->id;
            $this->save();
        }

        return $publisher;
    }

    public function getLabel(int $category = 0): QuestionLabel
    {
        return $this->getLabels($category)->first() ?? new QuestionLabel([
            'title' => ['ar' => 'جيد', 'en' => 'Accurate'],
            'icon'  => 'exclamation',
            'color' => 'green',
        ]);
    }

    public function getLabels(int $category = 0): Collection
    {
        return $this->review?->responses
            ?->whereIn(
                'option.question.weight',
                $category === 0
                    ? [Question::HUMAN_RIGHTS_WEIGHT, Question::CREDIBILITY_WEIGHT, Question::PROFESSIONALISM_WEIGHT]
                    : [$category]
            )?->where('option.weight', QuestionOption::MISTAKE)
            ?->pluck('option.question.label')
            ?->sortBy('priority') ?? collect();
    }

    public function getResponsesByCategory(int $category): Collection
    {
        return $this->review?->responses?->where('option.question.weight', $category)?->sortBy('option.question.order') ?? collect();
    }

    public function scopeFilter(Builder $query, array $request): Builder
    {
        $queryString = '%' . data_get($request, 'query') . '%';

        return $query->where('title', 'like', $queryString)
            ->orWhere('content', 'like', $queryString)
            ->orWhere('url', 'like', $queryString);
    }
}
