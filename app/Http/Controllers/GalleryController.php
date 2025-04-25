<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $gallery = Gallery::select('title', 'description', 'thumbnail', 'images')->orderBy('id', 'desc')->paginate(9);

        return view('pages.gallery.index', compact('gallery'));
    }
}
