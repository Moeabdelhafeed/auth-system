<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $feilds = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create($feilds);

        event(new Registered($user));

      return response()->json([
            'user' => $user,
        ], 200);

    }

    public function login(Request $request){
        $feilds = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|'
        ]);

        if (!Auth::attempt($feilds)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'Logged in successfully', 'user' => Auth::user()]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return response()->json(['message' => 'Logged out']);
    }
}
