<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicSearchRequest;
use App\Models\Topic;
use Illuminate\View\View;

class TopicController extends Controller
{
    public function index(TopicSearchRequest $request): View
    {
        return view('pages.topic.index', [
            'topics' => Topic::filter($request->safe()->toArray())->orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    public function show(Topic $topic): View
    {
        return view('pages.topic.show', compact('topic'));
    }
}
