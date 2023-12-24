<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PrivacyController extends Controller
{
    public function index(): View
    {
        return view('pages.privacy');
    }

    public function show(): View
    {
        return view('pages.cookies');
    }
}
