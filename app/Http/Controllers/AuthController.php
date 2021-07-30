<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=>'Incorrect'], 401);
        }

        $token = $user->createToken('fromAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response);
    }

    public function logout()
    {
        // Auth::user()->tokens->delete();

        Auth::user()->currentAccessToken()->delete();

        return response()->json($response['status']='success', 200);
    }
}
