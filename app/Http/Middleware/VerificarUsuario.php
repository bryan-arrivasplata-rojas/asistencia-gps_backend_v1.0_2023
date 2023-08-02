<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->has('admin') || $request->admin !='123'){
            return redirect(route('no_admin'));
        }
        return $next($request);
    }
}
