<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
{
    public function handle($request, Closure $next)
    {
        if (backpack_auth()->guest()) {
            return $this->respondToUnauthorizedRequest($request);
        }

        if (!$this->checkIfUserIsAdmin(backpack_user())) {
            return $this->respondToUnauthorizedRequest($request);
        }

        return $next($request);
    }

    private function respondToUnauthorizedRequest($request)
    {
        return ($request->ajax() || $request->wantsJson())
            ? response(trans('backpack::base.unauthorized'), 401)
            : redirect()->guest(backpack_url('login'));
    }

    private function checkIfUserIsAdmin($user): bool
    {
        // return ($user->is_admin == 1);
        return true;
    }
}
