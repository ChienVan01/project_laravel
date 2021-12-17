<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $token = $user->createToken('shopGearProjectToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string',
        ]);
        $user = User::where('Email',$data['email'])->first();
        
        if (!$user || !Hash::check($data['password'], $user->Password)) {
            return response(['message' => "Invalid Credentials", 401]);
        } else {
            $token = $user->createToken('shopGearProjectToken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];
            return response($response, 201);
        }
    }
}
