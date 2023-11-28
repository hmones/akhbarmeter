<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public const PAGINATION_ITEMS = 10;

    public function index(): View
    {
        $unReviewedArticles = Article::where('user_id', auth()->id())
            ->whereNull('score_at')
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();

        $reviewedArticles = Article::where('user_id', auth()->id())
            ->whereNotNull('score_at')
            ->orderBy('score_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);

        return view('dashboard', compact('reviewedArticles', 'unReviewedArticles'));
    }
}
