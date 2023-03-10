<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        //mengecek di auth ada data user yang login atau tidak 
        //kalau ada  masuk ke if terus next proses
        //kalau engga masuk ke else , menuju halaman login 
        if(Auth::check()) {
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
