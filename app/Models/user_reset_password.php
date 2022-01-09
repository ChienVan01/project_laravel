<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class user_reset_password extends Model
{
    protected $table= 'user_reset_passwords';

    public function getToken(){
        return hash_hmac('sha256', Str::random(40), config('app.key'));// tạo token reset password
    }
    public function createResetPassword($user)// kiểm tra trong user_reset_pass có tồn tại user hay ko nếu có thì gửi lại 
    {
        $activation = $this->getResetPassword($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);
    }

    private function regenerateToken($user)// khi yêu cầu gửi lại email thì sẽ gọi hàm này và xóa token cũ và cập nhật token mới
    {
        $token = $this->getToken();
        user_reset_password::where('User_id', $user->id)->update([
            'Reset_password_code' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createToken($user)// thêm token vào bảng user_reset_password với email tương ứng
    {
        $token = $this->getToken();
        user_reset_password::insert([
            'User_id' => $user->id,
            'Reset_password_code' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public function getResetPassword($user)// get user by id tham số nhận vào  là 1 user
    {
        return user_reset_password::where('User_id', $user->id)->first();
    }

    public function getResetPasswordByToken($token)// get user theo token
    {
        return user_reset_password::where('Reset_password_code', $token)->first();
    }

    public function deleteResetPassword($token)// xóa token cũ khi yêu cầu gửi lại mail
    {
        user_reset_password::where('Reset_password_code', $token)->delete();
    }
}
