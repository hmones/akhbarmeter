<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $topics = Topic::select('id', 'type', 'image', 'title')->orderBy('id', 'desc')->paginate(9);

        return view('pages.gallery.index', compact('topics'));
    }

    public function show($topicId): array
    {
        $topicDescription = Topic::findOrFail($topicId)->description;

        return Str::of($topicDescription)->matchAll('/<img[^>]+src="([^">]+)"/')->toArray();
    }
}
