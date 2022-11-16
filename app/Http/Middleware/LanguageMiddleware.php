<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('lang') && !in_array($request->get('lang'), ['ar', 'en'])) {
            return back();
        }

        app()->setLocale($request->get('lang'));

        return $next($request);
    }
}
