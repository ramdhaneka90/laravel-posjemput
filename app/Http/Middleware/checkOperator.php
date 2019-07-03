<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Session;

class CheckOperator
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
        if (!is_null(\Auth::guard('operator')->user()) && \Auth::guard('operator')->user()->role == 'Operator') {
            return $next($request);
        }
        return redirect()->back();
    }
}
