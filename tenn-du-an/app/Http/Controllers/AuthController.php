<?php

namespace App\Http\Controllers; 
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    
        if ($user && Hash::check($password, $user->password)) {
            if ($user->trangthai === 'hoatdong') {
                $id = $user->id_user;
                $taikhoan = $user->taikhoan;
                Session::put('id', $id);
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('error', 'Xin lỗi! Tài Khoản của bạn bị khóa');
            }
        } else {
            // Login failed
            return redirect()->route('login')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
}

