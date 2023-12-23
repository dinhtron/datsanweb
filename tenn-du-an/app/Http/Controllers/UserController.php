<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{

            public function getUserInfo($id)
            {
                // Lấy thông tin người dùng theo ID
                $user = User::where('id_user', $id)->first();
                if ($user) {
                    // Hiển thị thông tin người dùng
                    return view('user', compact('user'));
                } else {
                    // Xử lý khi không tìm thấy người dùng
                    return response()->json(['message' => 'Người dùng không tồn tại.'], 404);
                }
            }
            // Trong controller của bạn
                public function showUsers()
                {
                    $users = DB::table('users')->get();
                     return view('admin.users', ['users' => $users]);
                    
                }

                public function deleteUser($userId)
                {
                    $result = DB::table('users')->where('id_user', $userId)->delete();

                    if ($result) {
                        return response()->json(['message' => 'Xóa người dùng thành công'], 200);
                    } else {
                        return response()->json(['message' => 'Lỗi xóa người dùng'], 500);
                    }
                }

                public function changeStatus($userId, $newStatus)
                {
                    $result = DB::table('users')->where('id_user', $userId)->update(['trangthai' => $newStatus]);

                    if ($result) {
                        return response()->json(['message' => 'Thay đổi trạng thái thành công'], 200);
                    } else {
                        return response()->json(['message' => 'Lỗi thay đổi trạng thái'], 500);
                    }
                }

}
