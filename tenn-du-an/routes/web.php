<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/welcome', function () {
    return view('welcome'); });

// routes/web.php

// routes/web.php
Route::get('/home', function () {
    return view('home');
});
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/home/{id}/{taikhoan}', function ($id, $taikhoan) {
    return view('home', compact('id', 'taikhoan'));
})->name('home');
// routes/web.php

Route::get('/user/{id}', [UserController::class, 'getUserInfo']);
// routes/web.php

use App\Http\Controllers\YourController; // Thay thế YourController bằng tên thực tế của controller bạn đang sử dụng
Route::get('/bookings/{id}', [YourController::class, 'showBookings']);

Route::get('/register', [YourController::class, 'showRegistrationForm']);
Route::post('/register', [YourController::class, 'register']);

Route::get('/select-field/{id}', [YourController::class, 'showSelectFieldForm']);
Route::post('/select-field', [YourController::class, 'processFieldSelection']);

Route::get('/feedback', [YourController::class, 'showFeedbackForm']);
Route::post('/submit-feedback', [YourController::class, 'submitFeedback']);

// routes/web.php

use App\Http\Controllers\BookingController;
Route::get('/booking/{id_user}/{id_sanbong}', [BookingController::class, 'showBookingForm'])->name('booking');
Route::post('/booking/{id_user}/{id_sanbong}', [BookingController::class, 'showBookingForm']);
// routes/web.php

use App\Http\Controllers\FeedbackController;

Route::get('/feedback/{id}', [FeedbackController::class, 'showFeedbackForm']);
Route::post('/feedback/{id}', [FeedbackController::class, 'submitFeedback']);

// admin
use App\Http\Controllers\AdminController;

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'processLogin']);
Route::get('/admin/dashboard', function () {
    return view('admin.admin');
})->name('admin.admin');
Route::get('/admin/feedback', [AdminController::class, 'showFeedback']);
Route::get('/admin/donhang', [AdminController::class, 'showDashboard']);

Route::get('/admin/users', [UserController::class, 'showUsers']);
Route::delete('/admin/users/{userId}', [UserController::class, 'deleteUser']);
Route::patch('/admin/users/{userId}/{newStatus}', [UserController::class, 'changeStatus']);