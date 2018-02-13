<?php

namespace App\Http\Middleware;

use Closure;
use App\AppConstants;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedirectIfAuthenticated
 *
 * @package App\Http\Middleware
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }

    /**
     * Redirect to a page after autentication.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return AppConstants::BASE_REDIRECT;
    }
}
