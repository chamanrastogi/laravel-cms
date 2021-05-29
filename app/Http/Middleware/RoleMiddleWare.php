<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
       // $user = Auth::user();
       
        if(!$request->user()->userHasRole($role))
       {
        abort(403,'You are not authorized');
        }
        return $next($request);
    }
}
