<?php

namespace App\Http\Controllers\Auth;

use App\getMiddlewareRoutes;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    use getMiddlewareRoutes;
    public function login(LoginRequest $loginRequest)
    {
        $loginRequest->authenticate();
        $loginRequest->session()->regenerate();
        return $this->handleRoutes();

    }
}
