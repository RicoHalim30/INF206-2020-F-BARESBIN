<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
            if (auth()->user()->jenis == 'admin') {
                return $next($request);
            }else if(auth()->user()->jenis == 'pengepul'){
                return redirect('pengepul/dashboard');
            }else if(auth()->user()->jenis == 'pengumpul'){
                return redirect('pengumpul/dashboard');
            }
        }

        return $next($request);
    }
}
