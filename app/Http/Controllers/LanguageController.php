<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function store(LanguageRequest $request)
    {
        App::setLocale($request->lang);

        return back();
    }
}
