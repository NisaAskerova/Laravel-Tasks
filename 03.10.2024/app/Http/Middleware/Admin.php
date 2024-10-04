<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // İstifadəçi giriş edibsə və rolu admin-disə davam et
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/'); // İcazəsi olmayanlar əsas səhifəyə yönləndirilir
    }
}
