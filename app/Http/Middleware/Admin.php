<?php
use Illuminate\Http\Request;
namespace App\Http\Middleware;

use Closure;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user() != null)
        {
            if (auth()->user()->jenis == 'admin') {
                return $next($request);
            }else if(auth()->user()->jenis == 'pengepul'){
                return redirect('pengepul/dashboard');
            }else if(auth()->user()->jenis == 'pengumpul'){
                return redirect('pengumpul/dashboard');
            }
        }
        return redirect('/login');
    }
}
