<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
            $adminId = $result[0]->id;
            session(['admin_id' => $adminId]);
            return redirect()->route('admin.dashboard');
        } else {
            // Đăng nhập thất bại
            return view('admin.login')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
    public function showFeedback()
    {    $userId = session('admin_id');
        if (!$userId) {
            abort(404, 'Không tìm thấy');
        }
        $feedbacks = DB::table('phanhoi')->get();
        return view('admin.feedback', ['feedbacks' => $feedbacks]);
    }
    public function showDashboard()
    {
        $userId = session('admin_id');
        if (!$userId) {
            abort(404, 'Không tìm thấy');
        }
        $bookings = DB::table('bookings')->get();
        return view('admin.dashboard', ['bookings' => $bookings]);
    }
    

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tensanpham' => 'required|string',
            'gia' => 'required|numeric',
            'hinhanh' => 'required|string',
        ]);

        DB::table('sanpham')->insert([
            'tensanpham' => $request->input('tensanpham'),
            'gia' => $request->input('gia'),
            'hinhanh' => $request->input('hinhanh'),
        ]);

        return redirect()->route('products.create')->with('success', 'Sản phẩm đã được thêm vào cơ sở dữ liệu thành công');
    }
    public function logout()
    {
        Auth::logout();
        session()->forget('admin_id');
        return redirect('admin/login');
    }
}
