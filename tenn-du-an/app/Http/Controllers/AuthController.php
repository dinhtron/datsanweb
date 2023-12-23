<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('taikhoan', $username)->first();

        if ($user && $password === $user->password) {
            // Kiểm tra mật khẩu trực tiếp không được khuyến khích, hãy sử dụng Hash::check
            // Nhưng nếu bạn vẫn muốn kiểm tra mật khẩu trực tiếp, sử dụng ===
            
            // Lưu ý: Đây là tác vụ không an toàn, bạn nên sử dụng Hash::check để kiểm tra mật khẩu an toàn hơn.
            $id = $user->id_user;
            $taikhoan= $user->taikhoan;
            return redirect()->route('home', ['id' => $id, 'taikhoan' => $taikhoan]);
        } else {
            // Login failed
            return redirect()->route('login')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
}

