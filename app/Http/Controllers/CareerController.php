<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $careers = Career::active()->get();

        return view('pages.careers.index', compact('careers'));
    }

    public function show(Career $career): View
    {
        return view('pages.careers.show', compact('career'));
    }
}
