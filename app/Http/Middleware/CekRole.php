<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // ...$roles akan mengubah string yg dipisah dengan koma menjadi item array, namanya spread operator 
        //$request->user()->role akan ambil data user yg login bagian role
        if (in_array($request->user()->role, $roles)) {
            return $next($request);

        }else{
            return redirect()->back();
        }
    }
}
