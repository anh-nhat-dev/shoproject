<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Auth;
class CheckLogOut
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
        
        if (Auth::guest()) {
            return redirect()->route('site.login');
        }
        return $next($request);
    }
}
