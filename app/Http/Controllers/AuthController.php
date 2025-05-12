<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        try {
            // Create the user
            User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            ]);

            // Redirect to login route with success message
            return redirect()->route('login')->with('success', 'Registration done successfully.');
        } catch (\Exception $e) {
            // Redirect back to register route with error message
            return redirect()->back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }

    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($validatedData)) {
            return redirect()->route('home')->with('success', 'Login successful.');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Logout successful.');
    }
}
