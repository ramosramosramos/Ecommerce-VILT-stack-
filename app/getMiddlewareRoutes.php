<?php

namespace App;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait getMiddlewareRoutes
{
    public function handleRoutes()
    {
        if (Auth::user()->roles->contains('role', 'admin')) {
            return redirect()->route('admins.index');
        }
        if (Auth::user()->roles->contains('role', 'seller')) {
            return redirect()->route('sellers.index');
        }
        if (Auth::user()->roles->contains('role', 'customer')) {
            return redirect()->route('customers.index');
        }
    }

    public function check(Request $request, Closure $next, $role = "customer")
    {
        $user = Auth::user();
        


        if ($user->roles->contains('role', 'customer')) {
            if ($role == "customer") {
                return $next($request);
            }
            return redirect()->route('customers.index');
        }

        if ($user->roles->contains('role', 'seller')) {
            if ($role == "seller") {
                return $next($request);
            }
            return redirect()->route('sellers.index');
        }

        if ($user->roles->contains('role', 'admin')) {
            if ($role == "admin") {
                return $next($request);
            }
            return redirect()->route('admins.index');
        }

        return redirect()->route('login');
    }

}
