<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $topics = Tag::where('name', $request->name)->firstOrFail()->topics()
            ->with('tags')
            ->get();

        return view('pages.tag.index', compact('topics'));
    }
}
