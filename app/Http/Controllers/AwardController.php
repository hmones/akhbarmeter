<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AwardController extends Controller
{
    public function index(): View
    {
        return view('pages.awards.index', ['description' => Award::first()?->description]);
    }
}
