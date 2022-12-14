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
}
