<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LangCookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->cookie('language');

        if(is_null($id)){
            return $next($request);
        }

        if(app()->isLocale($id)){
            return $next($request);
        }

        $launguage = Language::where("active", true)->find($id);

        $launguage && app()->setLocale($id);


        return $next($request);
    }
}
