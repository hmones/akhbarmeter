<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->get('lang');

        if (in_array($lang, config('app.locales'))) {
            session(['locale' => $lang]);
        }

        app()->setLocale(session('locale', config('app.locale')));

        return $next($request);
    }
}
