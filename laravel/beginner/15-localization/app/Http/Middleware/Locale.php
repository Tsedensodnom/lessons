<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;


class Locale
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
        $locale = 'en';
        
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale = Config::get('app.locale');
        }
        
        \App::setLocale($locale);
        
        return $next($request);
    }
}
