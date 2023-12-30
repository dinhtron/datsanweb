<?php
// app/Http/Controllers/YourController.ph
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

// ...

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class YourController extends Controller
{
    public function showBookings()
    {   $id = Session::get('id');
        // Logic to retrieve data from the database
        $bookings = \DB::table('bookings')->where('id_user', $id)->get();
        $id_user = $id;
        $donhang = \DB::table('donhang')->where('id', $id)->get();
        // Convert the stdClass objects to an array
        $bookings = json_decode(json_encode($bookings), true);
    
        // Return view with data
        return view('bookings', compact('bookings', 'id_user','donhang'));
       
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Lấy dữ liệu từ form đăng ký
        $tai_khoan = $request->input('tai_khoan');
        $mat_khau = $request->input('mat_khau');
        $email = $request->input('email');
        $so_dt = $request->input('so_dt');
    
        // Kiểm tra xem email hoặc số điện thoại đã tồn tại chưa
        $existingUser = DB::table('users')
            ->where('email', $email)
            ->orWhere('so_dt', $so_dt)
            ->first();
    
        if ($existingUser) {
            // Nếu email hoặc số điện thoại đã tồn tại, chuyển hướng về trang đăng ký và hiển thị thông báo lỗi
            return Redirect::to('/register')->with('error', 'Email hoặc số điện thoại đã tồn tại. Vui lòng chọn thông tin khác.');
        }
    
        // Mã hóa mật khẩu bằng bcrypt trước khi lưu vào cơ sở dữ liệu
        $hashedPassword = Hash::make($mat_khau);
    
        // Thêm người dùng mới vào bảng users
        DB::table('users')->insert([
            'taikhoan' => $tai_khoan,
            'password' => $hashedPassword,
            'email' => $email,
            'so_dt' => $so_dt,
        ]);
    
        return Redirect::to('/login')->with('success', 'Đăng ký thành công!');
    }
    public function showSelectFieldForm()
    {    $id = Session::get('id');
        $fields = DB::table('sanbong')->get();
        return view('select_field', ['id_user' => $id, 'fields' => $fields]);
    }

    public function processFieldSelection(Request $request)
    {
        $id_user = $request->input('id_user');
        $id_field = $request->input('id_field');

        // Thực hiện các hành động cần thiết với sân bóng và ID người dùng đã chọn
        // Ví dụ: bạn có thể lưu thông tin này vào cơ sở dữ liệu

        // Chuyển hướng người dùng đến một trang khác (thay thế 'destination_page' bằng trang thực tế)
        return redirect()->route('booking', ['id_user' => $id_user, 'id_sanbong' => $id_field]);
        //return redirect()->route('booking', ['id_user' => 1, 'id_sanbong' => 2]);
    }
    public function showFeedbackForm()
    {
        $feedbackSubmitted = session('feedbackSubmitted', false);
        $allFeedbackList = DB::table('phanhoi')->get();

        return view('feedback_form', compact('feedbackSubmitted', 'allFeedbackList'));
    }

    public function submitFeedback(Request $request)
    {
        $feedback = $request->input('feedback-input');

        // Thực hiện các hành động cần thiết với phản hồi (ví dụ: lưu vào cơ sở dữ liệu)
        DB::table('phanhoi')->insert(['thongtin_phanhoi' => $feedback]);

        // Đánh dấu rằng phản hồi đã được gửi
        $request->session()->flash('feedbackSubmitted', true);

        // Chuyển hướng người dùng đến trang phản hồi
        return redirect('/feedback');
    }
    public function destinationPage()
    {
        // Your logic goes here

        return view('test'); // Change 'your.view.name' to the actual view name
    }
    public function showBookingForm(Request $request, $id_user, $id_sanbong)
    {
        // Fetch user details
        $user = DB::table('users')->where('id_user', $id_user)->first();

        if (!$user) {
            abort(404); // Xử lý trường hợp không tìm thấy người dùng
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
    public function logout()
        {
            // Xóa giá trị 'id' khỏi session
            Session::forget('id');

            // Thực hiện các công việc khác khi đăng xuất (nếu cần)

            // Chuyển hướng người dùng về trang chủ hoặc trang đăng nhập
            return redirect()->route('home');
        }
    
}
