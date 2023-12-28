<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Logic kết nối database hiện tại
        // ...

        $result = DB::select("SELECT * FROM admin WHERE username = ? AND password = ?", [$username, $password]);

        if (!empty($result)) {
            // Đăng nhập thành công
            return redirect()->route('admin.dashboard');
        } else {
            // Đăng nhập thất bại
            return view('admin.login')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
    public function showFeedback()
    {
        $feedbacks = DB::table('phanhoi')->get();
        return view('admin.feedback', ['feedbacks' => $feedbacks]);
    }
    public function showDashboard()
    {
        $bookings = DB::table('bookings')->get();
        return view('admin.dashboard', ['bookings' => $bookings]);
    }
}
