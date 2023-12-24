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
        $query = $request->safe()->toArray();
        $topics = Topic::filter($query)->whereType('fakeNews')->orderBy('published_at', 'desc')->paginate(self::PAGINATION_ITEMS);
        $tags = cache()->remember('fake.news.tags', 86400, fn () => Topic::whereType('fakeNews')->pluck('tags')->flatten()->unique());

        return view('pages.topic.fake-news', compact(['tags', 'topics']));
    }
}
