<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'article_type_id',
        'article_topic_id',
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
        $this->uploadFileToDisk($value, 'image', config('filesystems.default'), "article/image");
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
}
