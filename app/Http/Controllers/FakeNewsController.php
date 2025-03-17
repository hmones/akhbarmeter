<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicSearchRequest;
use App\Models\Topic;
use Illuminate\View\View;

class FakeNewsController extends Controller
{
    const PAGINATION_ITEMS = 9;

    public function index(TopicSearchRequest $request): View
    {
        $topics = Topic::whereType(Topic::FAKE_NEWS)
            ->when($request->subType, function($query) use ($request) {
                $query->where('sub_type', $request->subType);
            })
            ->orderBy('published_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);

        $tags = cache()->remember('topics.fake-news.tags', 86400, function () {
            return Topic::getTopTagsByType(Topic::FAKE_NEWS . '.topics.tags', Topic::FAKE_NEWS);
        });

        return view('pages.topic.fake-news', compact(['tags', 'topics']));
    }
}
