<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        return view('pages.video.index', ['videos' => Video::paginate(9)]);
    }

    public function create()
    {
        //
    }

    public function store(StoreVideoRequest $request)
    {
        //
    }

    public function show(Video $video): View
    {
        return view('pages.video.show', compact('video'));
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(StoreVideoRequest $request, Video $video)
    {
        //
    }

    public function destroy(Video $video)
    {
        //
    }
}
