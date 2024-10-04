<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->has('age')) {

        //     if ($request->age < 18) {
        //         return response()->json([
        //             'message'=>"You are not allowed"
        //         ]);
        //     } else {

        //         return $next($request);
        //     }
        // }
        // return response()->json([
        //     'message'=>"Age is required"
        // ]);
        if(!auth()->check()){
           return redirect()->route('show-login');
        }
        else{
            return $next($request);
           }
    }
}
