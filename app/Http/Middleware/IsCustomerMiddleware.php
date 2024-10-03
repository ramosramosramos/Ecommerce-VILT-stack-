<?php

namespace App\Http\Middleware;

use App\getMiddlewareRoutes;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsCustomerMiddleware
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
            return $this->check($request, $next);
        }

        return redirect()->back()->with('allowed', 'You are not allowed to this page');
    }
}
