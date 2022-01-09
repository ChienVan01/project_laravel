<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use App\Classes\ResetPasswordService;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
 
    public function getProfile(Request $request)
    {
        // try {
        //     $user_id = $request->user()->id;
        //     $user = User::find($user_id);
        //     return response()->json(['status' => 'true', 'message' => 'User Profile', 'data' => $user]);
        // } catch (\Exception $e) {
        //     return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'data' => []], 500);
        // }
        return auth()->user();
    }
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
        return redirect()->route('login');
    }

    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('Email', $data['email'])->first();

        if (($user->UserType_id != 1) || !Hash::check($data['password'], $user->Password)) {
            return response(['message' => 'The provided credentials are incorrect.'], 401);
        }
        $token = $user->createToken('ShopGearToken')->plainTextToken;
        $response = [
            'user' => $user,
            'tokenUser' => $token,
        ];
        session(['users' =>  $response]);
        return redirect()->route('/');
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
        session()->forget('users');
        return redirect()->route('/');
    }



  
}
