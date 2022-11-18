<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\VideoSearchRequest;
use App\Models\Video;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function index(VideoSearchRequest $request): View
    {
        return view('pages.video.index', [
            'videos' => Video::filter($request->safe()->toArray())->orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    public function store(StoreVideoRequest $request)
    {
        Video::create($request->safe()->toArray());

        return redirect()->route('videos.index')->with('success', 'Video is created successfully!');
    }

    public function show(Video $video): View
    {
        return view('pages.video.show', compact('video'));
    }

    public function update(StoreVideoRequest $request, Video $video)
    {
        $video->update($request->safe()->toArray());

        return redirect()->route('videos.index')->with('success', 'Video is updated successfully!');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video is deleted successfully!');
    }
}
