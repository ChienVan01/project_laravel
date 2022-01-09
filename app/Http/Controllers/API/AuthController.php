<?php

namespace App\Http\Controllers\API;

use App\Classes\ResetPasswordService;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    protected $resetPasswordService;
    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        $token = $user->createToken('ShopGearToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
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
        session(['users' =>  $response]);
        return response($response, 201);
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
    }
    public function resetPasswordUser($token) // chuyển hướng đến trang đổi mật khẩu
    {
        return redirect('http://localhost:3000/account/configPassword/' . $token); // link của front-end
    }

    public function ForgotPassword(Request $request) // yêu cầu gửi mail với mail tương ứng
    {
        $user = User::where('Email', $request->Email)->first();
        if ($user) {

            event(new Registered($user));
            $result = $this->resetPasswordService->sendResetPasswordMail($user);
            return response()->json(['message' => 'Email khôi phục mật khẩu đã được gửi'], 200);
        } else {
            return response()->json(['message' => 'Không tìm thấy Email'], 400);
        }
    }
    public function resetPasswordUserClient(Request $request, $token)
    {
        $rule = [
            "Password" => "regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
        ];
        $customMessage = [
            "Password.regex" => "Mật khẩu gồm 8 ký tự và Có 1 chữ viết hoa"
        ];
        $validator = Validator::make($request->all(), $rule, $customMessage);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $password = $request->Password;
        if ($user = $this->resetPasswordService->resetPasswordUser($token, $password)) {
            return response()->json(['message' => 'Mật khẩu đã được đổi'], 200);
        } else {
            return response()->json(['message' => 'Đổi mật khẩu không thành công'], 400);
        }
    }
}
