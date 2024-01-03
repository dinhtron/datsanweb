<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountSettingsController extends Controller
{
    public function updateAccount(Request $request)
    {   $id = Session::get('id');
        // Kiểm tra xem có dữ liệu được gửi từ form hay không
        if ($request->isMethod('post')) {
            // Lấy thông tin từ form
            $taikhoan = $request->input('new-username');
            $email = $request->input('new-email');
            $password = $request->input('new-password'); // Hash the password
            $so_dt = $request->input('so_dt');
            $dia_chi = $request->input('dia_chi');
            // Truy vấn SQL UPDATE
            DB::table('users')
                ->where('id_user', $id)
                ->update([
                    'taikhoan' => $taikhoan,
                    'email' => $email,
                    'password' => $password,
                    'so_dt' => $so_dt,
                    'address' => $dia_chi,
                ]);

            return redirect()->back()->with('success', 'Thông tin người dùng đã được cập nhật thành công.');
        } else {
            // Nếu không phải là request POST, hiển thị dữ liệu hiện tại trong form
            $user = DB::table('users')->select('taikhoan', 'email','so_dt','address')->where('id_user', $id)->first();

            return view('account-settings', [
                'id_user' => $id,
                'current_taikhoan' => $user->taikhoan,
                'current_email' => $user->email,
                'current_so_dt' => $user->so_dt,
                'current_dia_chi' => $user->address,
            ]);
        }
    }
    public function showAccountForm()
{    
    $id = Session::get('id');
    $user = DB::table('users')->select('taikhoan', 'email','so_dt','address')->where('id_user', $id)->first();

    return view('account-settings', [
        'id_user' => $id,
        'current_taikhoan' => $user->taikhoan,
        'current_email' => $user->email,
        'current_so_dt' => $user->so_dt,
        'current_dia_chi' => $user->address,
    ]);
}

}
