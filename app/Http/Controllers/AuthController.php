<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json(['message'=>'User registered','user'=>$user],201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error'=>'Invalid credentials'],401);
        }

        return response()->json([
            'token'=>$token,
            'user'=>auth()->user()
        ]);
    }

    public function profile()
    {
        return response()->json(auth()->user());
    }
}
