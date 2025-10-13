<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Master\Modules\Websites\Facades\Websites;

class SetApiLocale
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
        $lang = "en";
        if($request->route('language')) {
            $lang = $request->route('language');
            // and remove the language parameter so we dont have to include it in all controller methods.
            $request->route()->forgetParameter('language');
        }
        app()->setLocale($lang);
        setlocale(LC_ALL, Websites::currentLanguage('locale_code'));


        return $next($request);
    }
}
