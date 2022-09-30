<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeLanguage
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
        app()->setLocale('ar');
        if(asset($request->lang) && $request->lang == 'ar'){
            app()->setLocale('ar');
        }
        return $next($request);
    }
}
