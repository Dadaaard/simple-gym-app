<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role === 'admin') {
            return $next($request);
        }
        elseif ($request->user()->role === 'instructor') {
            return $next($request);
        }
        elseif ($request->user()->role === 'member') {
            return $next($request);
        }
        else {
            return redirect()->route('dashboard');
        }
    }
}
