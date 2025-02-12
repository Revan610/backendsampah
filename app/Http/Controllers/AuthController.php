<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|string|email|max:250|unique:users',
            'phone_number' => 'required|string|max:250|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'Access_token'=> $token,
            'token_type'=>'Bearer',
            'user' => $user,
            'message' => 'AKUN BERHASIL DIBUAT'
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message'=>'AKUN TIDAK DITEMUKAN'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'message' => 'LOGIN BERHASIL'
        ]);
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
            return response()->json([
                'message' => 'LOGOUT BERHASIL',
            ]);
        }
        return response()->json([
            'message' => 'TIDAK ADA AKUN YANG TERAUTENTIFIKASI',
        ], 401);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'password' => 'required|string|min:8',
        ]);

        $user= User::find($id);
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();
        return response()->json(['message' => 'UPDATE BERHASIL DILAKUKAN']);
    }
}
