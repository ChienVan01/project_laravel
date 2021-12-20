<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LogoutController extends Controller
{
    public function index(Request $request)
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
