<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\YourController; 
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SanBongController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DatabaseController; 
use App\Http\Controllers\SanphamController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// routes/web.php


Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('/home/{id}', function ($id) {
    Session::put('id', $id);
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'showHome'])->name('home');
Route::get('/user/{id}', [UserController::class, 'getUserInfo']);
Route::get('/bookings', [YourController::class, 'showBookings']);
Route::get('/logout', [YourController::class, 'logout'])->name('logout');
Route::get('/register', [YourController::class, 'showRegistrationForm']);
Route::post('/register', [YourController::class, 'register']);

Route::get('/select-field', [YourController::class, 'showSelectFieldForm'])->name('showSelectFieldForm');
Route::post('/select-field', [YourController::class, 'processFieldSelection'])->name('processFieldSelection');


Route::get('/booking/{id_sanbong}', [BookingController::class, 'showBookingForm'])->name('booking');
Route::post('/booking/{id_sanbong}', [BookingController::class, 'showBookingForm']);

Route::get('/feedback', [FeedbackController::class, 'showFeedbackForm'])->name('feedback.form');
Route::post('/feedback/submit', [FeedbackController::class, 'submitFeedback'])->name('feedback.submit');
Route::get('/check-for-changes/{id}', 'FeedbackController@checkForChanges');
Route::post('/update-account', [AccountSettingsController::class, 'updateAccount'])->name('updateAccount');
Route::get('/update-account', [AccountSettingsController::class, 'showAccountForm'])->name('showAccountForm');



// admin

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin/logout');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'processLogin']);

Route::get('/admin/feedback', [AdminController::class, 'showFeedback']);
Route::get('/admin/donhang', [AdminController::class, 'showDashboard']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
Route::get('/slides/create', [SlideController::class, 'create'])->name('slides.create');
Route::post('/slides', [SlideController::class, 'store'])->name('slides.store');
Route::delete('/slides/{id}', [SlideController::class, 'destroy'])->name('slides.destroy');


Route::get('/admin/users', [UserController::class, 'showUsers']);
Route::delete('/admin/users/{userId}', [UserController::class, 'deleteUser']);
Route::patch('/admin/users/{userId}/{newStatus}', [UserController::class, 'changeStatus']);

Route::get('/admin/sanbong', [SanBongController::class, 'index']);
Route::post('/add-san-bong', [SanBongController::class, 'store']);
Route::get('/delete-san-bong/{id}', [SanBongController::class, 'destroy']);

Route::get('/admin/dashboard', [DatabaseController::class, 'getStatistics']);
Route::get('/admin/dashboard',  [DatabaseController::class, 'getStatistics'])->name('admin.dashboard');

Route::get('/sanpham', [SanphamController::class, 'getSanphamData']);
Route::post('/select-product', [SanphamController::class, 'selectProduct']);

Route::get('/giohang/{id_sanpham}', [SanphamController::class, 'show']);
Route::post('/giohang/dat-don/{id_sanpham}', [SanphamController::class, 'datDon']);

Route::post('/luu-ngay', function (\Illuminate\Http\Request $request) {
    $ngayDuocChon = $request->input('ngayDuocChon');

    // Chuyển đổi ngày thành đối tượng Carbon
    $carbonNgay = Carbon::createFromFormat('Y-m-d', $ngayDuocChon);

    // Lưu ngày vào session
    session(['ngayDuocChon' => $carbonNgay]);

    // Lấy chuỗi thông báo với ngày được chọn
    $thongBao = 'Ngày ' . $carbonNgay->format('d/m/Y') . ' đã được chọn !';

    return redirect('/select-field')->with('thongbao', $thongBao);
});

