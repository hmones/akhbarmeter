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
        $topics = Topic::where('type', '!=', Topic::FAKE_NEWS)
            ->when($request->type, function($query) use ($request) {
                $query->where('type', $request->type);
            })
            ->when($request->subType, function($query) use ($request) {
                $query->where('sub_type', $request->subType);
            })
            ->orderBy('published_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);
        $tags = Topic::getTopTagsByType('topics.all.tags');

        return view('pages.topic.index', compact('tags', 'topics'));
    }

    public function show(Topic $topic): View
    {
        $topic->load('teamMember', 'tags:id,name');
        $topic = new TopicResource($topic);

        return view('pages.topic.show', [
            'topic'    => $topic->toArray(request()),
            'related'  => Topic::where('type', $topic->type)->where('id', '!=', $topic->id)->orderBy('created_at', 'desc')->take(3)->get(),
            'readMore' => Topic::where('type', '!=', $topic->type)->orderBy('created_at', 'desc')->take(6)->get(),
        ]);
    }
}
