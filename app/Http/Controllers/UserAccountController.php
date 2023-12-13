<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        // Validate the request and create the user
        // The password is hashed automatically by the User model password() mutator
        $user = User::create(
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ])
        );

        // Log the user in
        Auth::login($user);

        // Redirect the user back to the listing page with a success message
        return redirect()->route('listing.index')->with('success', 'User created successfully.');
    }
}
