<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Publication;
use App\Models\PublisherScore;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\Video;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('review.responses.option.question.label')->whereNotNull('score_at')->whereActive(1)->orderBy('created_at', 'desc')->limit(6)->get();
        $topics = Topic::whereNot('type', Topic::FAKE_NEWS)->orderBy('created_at', 'desc')->limit(3)->get();
        $publications = Publication::orderBy('created_at', 'desc')->limit(3)->get();
        $video = Video::latest()->first();
        $fakeNews = Topic::fake()->orderBy('id', 'DESC')->limit(3)->get();
        $gallery = Gallery::orderBy('id', 'DESC')->limit(3)->get();
        $trendingHashtags = cache()->rememberForever('tags', fn () => Tag::select('name')->pluck('name')->flatten()->unique());

        return view(
            'welcome',
            compact([
                'articles',
                'topics',
                'gallery',
                'publications',
                'video',
                'fakeNews',
                'trendingHashtags',
            ])
        );
    }
}
