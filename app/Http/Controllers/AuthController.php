<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return inertia("Auth/Login");
    }

    public function store(Request $request)
    {
        $cadentials = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        if (Auth::attempt($cadentials, $request->boolean("remember"))) {
            $request->session()->regenerate();
            return redirect()->intended()->with("success", "Successfully logged in");
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
