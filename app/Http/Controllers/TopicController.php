<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicSearchRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\View\View;

class TopicController extends Controller
{
    const PAGINATION_ITEMS = 9;

    public function index(TopicSearchRequest $request): View
    {
        $query = $request->safe()->toArray();
        $topics = Topic::filter($query)->where('type', '!=', Topic::FAKE_NEWS)->orderBy('published_at', 'desc')->paginate(self::PAGINATION_ITEMS);
        $tags = cache()->remember('topics.tags', 86400, fn () => Topic::where('type', '!=', Topic::FAKE_NEWS)->pluck('tags')->flatten()->unique());

        return view('pages.topic.index', compact('tags', 'topics'));
    }

    public function show(Topic $topic): View
    {
        $topic->load('teamMember', 'tags:id,name');
        $topic = new TopicResource($topic);

        return view('pages.topic.show', [
            'topic'   => $topic->toArray(request()),
            'related' => Topic::where('type', $topic->type)->orderBy('created_at', 'desc')->take(9)->get(),
        ]);
    }
}
