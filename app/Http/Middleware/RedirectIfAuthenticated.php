<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {

        // if(Auth::guard($guard)->check() && $request->route()->named('login') ) {
        //     return redirect()->route('dashboard');

        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if(Auth::guard($guard)->check() && $request->route()->named('admin.login') )
                return redirect(RouteServiceProvider::ADMIN_DASHBOARD);

            if(Auth::guard($guard)->check() && $request->route()->named('login') )
                return redirect(RouteServiceProvider::HOME);

            // if (Auth::guard($guard)->check())
            //     return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
