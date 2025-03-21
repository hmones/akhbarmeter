<?php

namespace App\Http\Controllers;

use App\Models\FactCheckingMethodology;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FactCheckingMethodologyController extends Controller
{
    public function index(): View
    {
        return view('pages.about.fact-checking-methodology', ['description' => FactCheckingMethodology::first()?->description]);
    }
}
