<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Session;

class CheckCustomer
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
        if (!is_null(\Auth::guard('web')->user())) {
            return $next($request);
        }
        return redirect()->back();
    }
}
