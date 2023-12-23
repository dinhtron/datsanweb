<?php
// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function showFeedbackForm($id)
    {
        $userInfo = $this->getUserInfo($id);

        return view('feedback.form', ['userInfo' => $userInfo]);
    }

    public function submitFeedback(Request $request, $id)
    {
        $userInfo = $this->getUserInfo($id);

        $thongtin_phanhou = $request->input('thongtin_phanhou');

        // Thêm thông tin vào cơ sở dữ liệu
        DB::table('phanhoi')->insert([
            'id_user' => $id,
            'taikhoan' => $userInfo->taikhoan,
            'email' => $userInfo->email,
            'thongtin_phanhoi' => $thongtin_phanhou,
        ]);

        return "Phản hồi đã được gửi thành công!";
    }

    private function getUserInfo($id)
    {
        return DB::table('users')->select('id_user','taikhoan', 'email')->where('id_user', $id)->first();
    }
}
