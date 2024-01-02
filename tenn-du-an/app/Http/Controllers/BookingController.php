<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function showBookingForm(Request $request, $id_sanbong)
    {   $id_user= Session::get('id');
        $sanbongInfo = DB::table('sanbong')
        ->select('giasan', 'opening_time', 'closing_time')
        ->where('id_sanbong', $id_sanbong)
        ->first();
    
        $giasan = $sanbongInfo->giasan;
        // Fetch user details
        $user = DB::table('users')->where('id_user', $id_user)->first();

        if (!$user) {
            abort(404,'khong tim thay'); // Xử lý trường hợp không tìm thấy người dùng và hiển thị thông báo 'User not found'
        }

        $email = $user->email;
        $taikhoan = $user->taikhoan;
        $selectedDate = session('ngayDuocChon');

        // Truy vấn cơ sở dữ liệu với điều kiện ngày
        $bookings = DB::table('bookings')
            ->where('id_san', $id_sanbong)
            ->whereDate('checkin_date', $selectedDate)
            ->get();
        if ($request->isMethod('post')) {
            // Xử lý form được gửi đi
            $checkin_date = $request->input('checkin_date');
            $checkin_time = $request->input('checkin_time');
            $checkout_time = $request->input('checkout_time');

            // Tính giá và thêm đơn đặt sân
            $price = $this->calculatePrice(strtotime($checkin_date . ' ' . $checkin_time), strtotime($checkin_date . ' ' . $checkout_time),$giasan);

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
             
                $allowedCheckinStartTime = strtotime($sanbongInfo->opening_time);
                $allowedCheckinEndTime = strtotime($sanbongInfo->closing_time);
            
                $checkin_time1 = strtotime($request->input('checkin_time'));
                $checkout_time1 = strtotime($request->input('checkout_time'));
                if ($checkin_time1 < $allowedCheckinStartTime || $checkout_time1 > $allowedCheckinEndTime) {
                    // Thông báo lỗi nếu giờ checkin không hợp lệ
                    $request->session()->flash('bookingAdded', false);
                    $request->session()->flash('bookingAdded1', false);
                    $request->session()->flash('bookingAdded2',false);
                    $request->session()->flash('bookingAdded3', true);
                    return view('booking.form', compact('id_user', 'id_sanbong', 'email', 'taikhoan', 'bookings', 'giasan'));
                }
            if (strtotime($checkout_time) <= strtotime($checkin_time)) {
                    $request->session()->flash('bookingAdded2', true);
                    $request->session()->flash('bookingAdded1', false);
                    $request->session()->flash('bookingAdded', false);
                    return view('booking.form', compact('id_user', 'id_sanbong', 'email', 'taikhoan', 'bookings','giasan'));
                } 
            if ($existingBooking) {
                $request->session()->flash('bookingAdded', false);
                $request->session()->flash('bookingAdded2', false);
                $request->session()->flash('bookingAdded1', true);
                return view('booking.form', compact('id_user', 'id_sanbong', 'email', 'taikhoan', 'bookings','giasan'));
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
                $request->session()->flash('bookingAdded1', false);
                $request->session()->flash('bookingAdded2', false);
                $request->session()->flash('bookingAdded', true);
                return view('booking.form', compact('id_user', 'id_sanbong', 'email', 'taikhoan', 'bookings','giasan'));
            }
        }
        $request->session()->flash('bookingAdded2', false);
        $request->session()->flash('bookingAdded1', false);
        $request->session()->flash('bookingAdded', false);
        return view('booking.form', compact('id_user', 'id_sanbong', 'email', 'taikhoan', 'bookings','giasan'));
    }

    private function calculatePrice($checkin_datetime, $checkout_datetime,$hourly_rate)
    {
        // Thêm logic giá của bạn ở đây
        $hours_difference = ($checkout_datetime - $checkin_datetime) / 3600; // Chuyển đổi giây thành giờ
        $price = $hours_difference * $hourly_rate;

        return $price;
    }
}
