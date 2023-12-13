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
        // Validate the request and initiate the user model
        $user = User::make(
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ])
        );

        // Hash the password
        $user->password = Hash::make($request->password);

        // Save the user into the database
        $user->save();

        // Log the user in
        Auth::login($user);

        // Redirect the user back to the listing page with a success message
        return redirect()->route('listing.index')->with('success', 'User created successfully.');
    }
}
