<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function showBookingForm(Request $request, $id_user, $id_sanbong)
    {
        // Fetch user details
        $user = DB::table('users')->where('id_user', $id_user)->first();

        if (!$user) {
            abort(404,'khong tim thay'); // Xử lý trường hợp không tìm thấy người dùng và hiển thị thông báo 'User not found'
        }

        $email = $user->email;
        $taikhoan = $user->taikhoan;

        $bookings = DB::table('bookings')->get();

        if ($request->isMethod('post')) {
            // Xử lý form được gửi đi
            $checkin_date = $request->input('checkin_date');
            $checkin_time = $request->input('checkin_time');
            $checkout_time = $request->input('checkout_time');

            // Tính giá và thêm đơn đặt sân
            $price = $this->calculatePrice(strtotime($checkin_date . ' ' . $checkin_time), strtotime($checkin_date . ' ' . $checkout_time));

            $existingBooking = DB::table('bookings')
                ->where('checkin_date', $checkin_date)
                ->where('id_san', $id_sanbong)
                ->where(function ($query) use ($checkin_time, $checkout_time) {
                    $query->where(function ($q) use ($checkin_time, $checkout_time) {
                        $q->where('checkin_time', '<', $checkout_time)
                            ->where('checkout_time', '>', $checkin_time);
                    })
                        ->orWhere(function ($q) use ($checkin_time, $checkout_time) {
                            $q->where('checkout_time', '>', $checkin_time)
                                ->where('checkout_time', '<', $checkout_time);
                        });
                })
                ->first();

            if ($existingBooking) {
                return "Khoảng thời gian đã được đặt. Vui lòng chọn khoảng thời gian khác.";
            } else {
                DB::table('bookings')->insert([
                    'taikhoan' => $taikhoan,
                    'email' => $email,
                    'checkin_date' => $checkin_date,
                    'checkin_time' => $checkin_time,
                    'checkout_time' => $checkout_time,
                    'id_user' => $id_user,
                    'price' => $price,
                    'id_san' => $id_sanbong,
                ]);

                return "Đơn hàng đã được thêm vào giỏ hàng.";
            }
        }

        return view('booking.form', compact('id_user', 'id_sanbong', 'email', 'taikhoan', 'bookings'));
    }

    private function calculatePrice($checkin_datetime, $checkout_datetime)
    {
        // Thêm logic giá của bạn ở đây
        $hours_difference = ($checkout_datetime - $checkin_datetime) / 3600; // Chuyển đổi giây thành giờ
        $hourly_rate = 10; // Đặt giá theo giờ của bạn
        $price = $hours_difference * $hourly_rate;

        return $price;
    }
}
