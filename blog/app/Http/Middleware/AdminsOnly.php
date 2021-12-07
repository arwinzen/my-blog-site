<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminsOnly
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
        if(strtolower(auth()->user()?->username) !== 'arwinzen'){
            return redirect('/');
//            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
