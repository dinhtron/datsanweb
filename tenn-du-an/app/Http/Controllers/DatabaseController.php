<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function getStatistics()
    {
        // Lấy số lượng người dùng
        $totalUsers = DB::table('users')->count();

        // Lấy tổng giá trị của cột 'price' trong bảng 'bookings'
        $totalPrice = DB::table('bookings')->sum('price');

        // Đếm số lượng dòng trong bảng 'sanbong' theo cột 'id_sanbong'
        $totalSanbong = DB::table('sanbong')->count();

        return view('admin.statistics', compact('totalUsers', 'totalPrice', 'totalSanbong'));
    }
}
