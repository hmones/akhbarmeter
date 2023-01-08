<?php

namespace App\Observers;

use App\Jobs\FetchArticle;
use App\Models\Article;

class ArticleObserver
{
    public $afterCommit = true;

    public function created(Article $article): void
    {
        FetchArticle::dispatch($article);
    }
}
