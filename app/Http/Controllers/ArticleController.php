<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleSearchRequest;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public const PAGINATION_ITEMS = 9;

    public function index(ArticleSearchRequest $request): View
    {
        $articles = Article::filter($request->safe()->toArray())
            ->whereNotNull('score_at')
            ->whereActive(1)
            ->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);

        return view('pages.article.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('pages.article.show', compact('article'));
    }
}
