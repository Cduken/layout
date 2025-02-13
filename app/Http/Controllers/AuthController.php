<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate input fields
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        // Register the user
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']), // Encrypt password
        ]);

        // Log in the new user
        Auth::login($user);

        // Redirect
        return redirect('/login');
    }

    // ✅ Add the login method
    public function login(Request $request)
    {
        // Validate the login input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }
}
