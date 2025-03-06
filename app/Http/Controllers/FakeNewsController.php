<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\View\View;

class FakeNewsController extends Controller
{
    const PAGINATION_ITEMS = 9;

    public function index(): View
    {
        $topics = Topic::whereType(Topic::FAKE_NEWS)->orderBy('published_at', 'desc')->paginate(self::PAGINATION_ITEMS);
        $tags = Topic::getTopTagsByType(Topic::FAKE_NEWS . '.topics.tags', Topic::FAKE_NEWS);

        return view('pages.topic.fake-news', compact(['tags', 'topics']));
    }
}
