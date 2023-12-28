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

Route::get('/', function () {
    return view('home'); });
// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageSent;
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
use Illuminate\Support\Facades\Session;

Route::get('/home/{id}/', function ($id) {
    Session::put('id', $id);
    return redirect()->route('home');
});

Route::get('/home', function () {
    $id = Session::get('id');
    Session::put('id', $id);
    return view('home', compact('id'));
})->name('home');
// routes/web.php

Route::get('/user/{id}', [UserController::class, 'getUserInfo']);
// routes/web.php

use App\Http\Controllers\YourController; // Thay thế YourController bằng tên thực tế của controller bạn đang sử dụng
Route::get('/bookings', [YourController::class, 'showBookings']);
Route::get('/logout', [YourController::class, 'logout'])->name('logout');
Route::get('/register', [YourController::class, 'showRegistrationForm']);
Route::post('/register', [YourController::class, 'register']);

Route::get('/select-field', [YourController::class, 'showSelectFieldForm'])->name('showSelectFieldForm');
Route::post('/select-field', [YourController::class, 'processFieldSelection'])->name('processFieldSelection');



// routes/web.php

use App\Http\Controllers\BookingController;
Route::get('/booking/{id_sanbong}', [BookingController::class, 'showBookingForm'])->name('booking');
Route::post('/booking/{id_sanbong}', [BookingController::class, 'showBookingForm']);
// routes/web.php

use App\Http\Controllers\FeedbackController;
Route::get('/feedback', [FeedbackController::class, 'showFeedbackForm'])->name('feedback.form');
Route::post('/feedback/submit', [FeedbackController::class, 'submitFeedback'])->name('feedback.submit');
// Show feedback form
Route::get('/check-for-changes/{id}', 'FeedbackController@checkForChanges');


use App\Http\Controllers\AccountSettingsController;

Route::post('/update-account', [AccountSettingsController::class, 'updateAccount'])->name('updateAccount');
Route::get('/update-account', [AccountSettingsController::class, 'showAccountForm'])->name('showAccountForm');
// admin
use App\Http\Controllers\AdminController;

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'processLogin']);

Route::get('/admin/feedback', [AdminController::class, 'showFeedback']);
Route::get('/admin/donhang', [AdminController::class, 'showDashboard']);

Route::get('/admin/users', [UserController::class, 'showUsers']);
Route::delete('/admin/users/{userId}', [UserController::class, 'deleteUser']);
Route::patch('/admin/users/{userId}/{newStatus}', [UserController::class, 'changeStatus']);
// routes/web.php

use App\Http\Controllers\SanBongController;

Route::get('/admin/sanbong', [SanBongController::class, 'index']);
Route::post('/add-san-bong', [SanBongController::class, 'store']);
Route::get('/delete-san-bong/{id}', [SanBongController::class, 'destroy']);

use App\Http\Controllers\DatabaseController; 
Route::get('/admin/dashboard', [DatabaseController::class, 'getStatistics']);