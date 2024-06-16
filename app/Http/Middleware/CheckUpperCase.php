<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUpperCase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $segments = array_map('strtolower', $request->segments());

        if(implode('/', $segments) !== $request->path()) {
            return redirect(implode('/', $segments));
        }

        return $next($request);
    }
}
