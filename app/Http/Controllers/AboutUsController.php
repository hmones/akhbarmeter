<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function index(): View
    {
        $description = AboutUs::first()?->description;

        return view('pages.about.main', compact('description'));
    }
}
