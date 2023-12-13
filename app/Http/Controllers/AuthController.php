<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Display sign-in form
    public function create()
    {
        return inertia('Auth/Login');
    }

    // Process sign-in form
    public function store(Request $request)
    {
        if(!Auth::attempt(
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]), true
        )) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }

    // Process sign-out
    public function destroy()
    {

    }
}
