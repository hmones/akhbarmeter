<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicSearchRequest;
use App\Models\Topic;
use Illuminate\View\View;

class TopicController extends Controller
{
    const PAGINATION_ITEMS = 3;

    public function index(TopicSearchRequest $request): View
    {
        $query = $request->safe()->toArray();
        $violations = Topic::filter($query)
            ->whereType('violations')
            ->orderBy('published_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);
        $fakeNews = Topic::filter($query)
            ->whereType('fakeNews')
            ->orderBy('published_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);
        $codeOfEthics = Topic::filter($query)
            ->whereType('codeOfEthics')
            ->orderBy('published_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);
        $other = Topic::filter($query)
            ->whereType('other')
            ->orderBy('published_at', 'desc')
            ->paginate(self::PAGINATION_ITEMS);
        $tags = cache()->remember('tags', 86400, fn () => \App\Models\Topic::select('tags')->pluck('tags')->flatten()->unique());

        return view('pages.topic.index', [
            'tags'            => $tags,
            'topics'          => compact(['violations', 'codeOfEthics', 'fakeNews', 'other']),
            'paginationTopic' => data_get(array_keys(collect([
                'violations'   => $violations->count(),
                'fakeNews'     => $fakeNews->count(),
                'codeOfEthics' => $codeOfEthics->count(),
                'other'        => $other->count(),
            ])->filter(fn($value) => $value === self::PAGINATION_ITEMS)->toArray()), 0)
        ]);
    }

    public function show(Topic $topic): View
    {
        return view('pages.topic.show', [
            'topic'   => $topic,
            'related' => Topic::where('type', $topic->type)->orderBy('created_at', 'desc')->take(9)->get()
        ]);
    }
}
