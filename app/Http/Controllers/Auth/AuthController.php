<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(LoginRequest $loginRequest)
    {
        $loginRequest->authenticate();
        $loginRequest->session()->regenerate();
        if(Auth::user()->roles->role ="admin"){
            return redirect()->route('admins.index');
        }

        return redirect()->route('home');
    }
}
