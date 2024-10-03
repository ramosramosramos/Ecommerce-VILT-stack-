<?php

namespace App\Http\Middleware;

use App\getMiddlewareRoutes;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSellerMiddleware
{
    use getMiddlewareRoutes;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {

            return $this->check($request,$next,"seller");

        }
        return redirect()->back()->with('allowed', 'You are not allowed to this page');
    }
}
