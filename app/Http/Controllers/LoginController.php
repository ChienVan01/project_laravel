<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string',
        ]);
        $user = User::where('Email',$data['email'])->first();
        
        if (!$user || !Hash::check($data['password'], $user->Password)) {
            return redirect('/404');
            // return response(['message' => "Invalid Credentials", 401]);
        } else {
            $token = $user->createToken('shopGearProjectToken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];  
            
            // return response($response, 201);
            return redirect('/dashboard');
        }
    }
}
