<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $token = $user->createToken('ShopGearToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        //return response($response, 201);
        return redirect()->Route('/');
    }

    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('Email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->Password)) {
            return response(['message' => 'The provided credentials are incorrect.'], 401);
        }
        $token = $user->createToken('ShopGearToken')->plainTextToken;
        $response = [
            'user' => $user,
            'tokenUser' => $token,
        ];
        session(['user' =>  $response]);
        //return response($response, 201);
          return redirect()->Route('/');
    }
    public function logout(Request $request)
    {
        if ($token = $request->bearerToken()) {
            $model = Sanctum::$personalAccessTokenModel;
            $accessToken = $model::findToken($token);
            $accessToken->delete();
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
        session()->forget('user');
        return redirect()->Route('/');
       
    }
}
