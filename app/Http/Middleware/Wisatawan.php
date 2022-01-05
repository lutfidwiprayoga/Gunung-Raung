<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Wisatawan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->level == 'wisatawan') {
            return $next($request);
        }
        return redirect('/');
    }
}
