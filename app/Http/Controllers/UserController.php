<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show register/create form
    public function create()
    {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request)
    {
        // Validate and create user
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Log the user in
        auth()->login($user);

        return redirect('/')->with('message', 'User registered successfully.');
    }

    // Show login form
    public function login()
    {
        return view('users.login');
    }

    // Login user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Logout user
    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out successfully.');
    }
}
