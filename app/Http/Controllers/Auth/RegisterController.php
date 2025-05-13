<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return Inertia::render("Auth/Register");
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8|confirmed",
        ]);


        $user = User::create($credentials);

        Auth::login($user);
        session()->flash("success", "Successfully Registered");
        return redirect()->route("home");
    }
}
