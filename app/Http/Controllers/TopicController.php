<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicSearchRequest;
use App\Models\Topic;
use Illuminate\View\View;

class TopicController extends Controller
{
    const PAGINATION_ITEMS = 9;

    public function index(TopicSearchRequest $request): View
    {
        $violations = Topic::filter($request->safe()->toArray())->where('type', 'violations')->orderBy('created_at', 'desc')->paginate(self::PAGINATION_ITEMS);
        $fakeNews = Topic::filter($request->safe()->toArray())->where('type', 'fakeNews')->orderBy('created_at', 'desc')->paginate(self::PAGINATION_ITEMS);
        $codeOfEthics = Topic::filter($request->safe()->toArray())->where('type', 'codeOfEthics')->orderBy('created_at', 'desc')->paginate(self::PAGINATION_ITEMS);

        return view('pages.topic.index', [
            'topics'          => compact(['violations', 'codeOfEthics', 'fakeNews']),
            'paginationTopic' => data_get(array_keys(collect([
                'violations'   => $violations->count(),
                'fakeNews'     => $fakeNews->count(),
                'codeOfEthics' => $codeOfEthics->count()
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
