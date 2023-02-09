<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')->withSuccess('Logged in successfully');
        }

        return redirect('admin/login')->withSuccess('Invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('admin/login')->withSuccess('Logged out successfully');
    }
}
