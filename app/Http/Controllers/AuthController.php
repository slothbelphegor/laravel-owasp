<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            if ($request->wantsJson()) {
                return response()->json(['token' => $token], 200);
            }

            // Store token in session for web usage
            session(['api_token' => $token]);
            return redirect()->intended('/')->with('message', 'Logged in successfully');
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($request->wantsJson()) {
            return response()->json(['token' => $token, 'user' => $user], 201);
        }

        // Store token in session for web usage
        session(['api_token' => $token]);
        return redirect('/')->with('message', 'Registered and logged in successfully');
    }

    public function logout(Request $request)
    {
        // Revoke all tokens...
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Logged out successfully']);
        }

        return redirect('/')->with('message', 'Logged out successfully');
    }
}
