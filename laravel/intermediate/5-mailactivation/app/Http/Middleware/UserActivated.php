<?php

namespace App\Http\Middleware;

use Closure;

class UserActivated
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
        $user = \Auth::user();
        
        if (!$user->is_activated) {
            return redirect()->guest('user/activation');
        }
        
        return $next($request);
    }
}
