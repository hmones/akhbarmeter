<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Publication;
use App\Models\Publisher;
use App\Models\PublisherScore;
use App\Models\Topic;
use App\Models\Video;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Article::whereNotNull('score_at')->whereActive(1)->orderBy('created_at', 'desc')->limit(6)->get();
        $topics = Topic::orderBy('created_at', 'desc')->limit(3)->get();
        $publications = Publication::orderBy('created_at', 'desc')->limit(3)->get();
        $video = Video::latest()->first();
        $fakeNews = Article::whereIsFake(1)->whereActive(1)->latest()->limit(3)->get();
        $scores = PublisherScore::wherePeriod(PublisherScore::PERIOD_MONTH)->orderBy('to', 'desc')->limit(10)->get()->sortBy('rank');
        $worst = $scores->pop();
        $worstThree = $scores->pop(3);
        $scores->pop(2);
        $bestThree = $scores->pop(3);
        $best = $scores->pop();
        $trendingHashtags = [
            '#Trending', '#Egypt', '#Worldwide', '#Fashion', '#Economy', '#CairoFilmFestival', '#UkraineWar', '#Startups', '#Drama', '#Ramadan2023', '#EuropeToday', '#SinaiFestival'
        ];

        return view('welcome', compact('articles', 'topics', 'publications', 'video', 'fakeNews', 'best', 'bestThree', 'worst', 'worstThree', 'trendingHashtags'));
    }
}
