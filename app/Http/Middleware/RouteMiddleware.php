<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class RouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $segments = $request->segments();
        if(in_array("admin", $segments)){
            return $next($request);
        }

        $prefix = Language::routePrefix();
        $currentLanguage = app()->getLocale();
        $defaultLanguage = Language::findDefault();
        $languages = Language::where("active", true)->get();
        $selectedLanguage = Language::where("id", $currentLanguage)->first();

        View::share("languages", $languages);
        View::share("selectedLanguage", $selectedLanguage);

        if($currentLanguage === $defaultLanguage){
            if($prefix === null){
                return $next($request);
            }
            return $this->redirect($request, $defaultLanguage, $prefix);
        }
        if ($prefix === $currentLanguage) {
            return $next($request);
        }


        return $this->redirect($request, $currentLanguage, $defaultLanguage, $prefix);




    }

    private function redirect(Request $request, string $language, string $defaultLanguage, string|null $prefix): Response
    {

        $url = $language;

        if($language === $defaultLanguage){
            $url = "";
        }

        $segments = $request->segments();

        $prefix && array_shift($segments);

        if($path = implode("/", $segments)){
            $url .= "/".$path;
        }

        if($query = $request->getQueryString()){
            $url .= "?".$query;
        }
        return redirect($url);
    }

}
