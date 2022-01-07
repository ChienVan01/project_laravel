<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    public function forgotPassword(Request $request){
        $request->validate(['email' => 'required|email|exists:users']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status == Password::RESET_LINK_SENT){
            return[
                'status' =>__($status)
            ];
        }
        throw ValidationException::withMessages([
            'email' =>[trans($status)],
        ]);
        //   return $status === Password::RESET_LINK_SENT
        //         ? back()->with(['status' => __($status)])
        //         : back()->withErrors(['email' => __($status)]);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
        if($status == Password::PASSWORD_RESET){
            return[
                'status' =>__($status)
            ];
        }
        throw ValidationException::withMessages([
            'email' =>[trans($status)],
        ]);
        // return $status === Password::PASSWORD_RESET
        //             ? redirect()->route('login')->with('status', __($status))
        //             : back()->withErrors(['email' => [__($status)]]);
    }
}
