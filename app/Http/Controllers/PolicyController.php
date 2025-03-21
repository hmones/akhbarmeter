<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\View\View;

class PolicyController extends Controller
{
    public function index(): View
    {
        return view('pages.policy.index', ['description' => Policy::first()?->description]);
    }
}
