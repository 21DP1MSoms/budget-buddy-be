<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

// Ensure you have a User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:24',
            'email' => 'required|email|max:144',
            'password' => 'required|min:8|max:255',
        ]);
        $validated['password'] = bcrypt($validated['password']);

        return response()->json(User::create($validated));
    }
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|max:144',
            'password' => 'required|min:8|max:255',
        ]);

        if (Auth::attempt($validated)) {
            return response()->json([
                'token' => auth()->user()->createToken('login')->plainTextToken,
            ]);
        }

        return response()->json([
            'message' => 'Email and or password does not match any registered user.',
        ], 401);
    }
    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json();
    }

    public function user(Request $request) {
       return $request->user();
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
}
