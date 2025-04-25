<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrivacyPolicyController extends Controller
{
    public function index(): View
    {
        return view('pages.privacy', ['description' => PrivacyPolicy::first()?->description]);
    }

    public function show(): View
    {
        return view('pages.cookies');
    }
}
