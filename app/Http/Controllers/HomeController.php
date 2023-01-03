<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Publication;
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

        return view('welcome', compact('articles', 'topics', 'publications', 'video', 'fakeNews'));
    }
}
