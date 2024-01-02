<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/feedback.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>

</head>

<body>
<?php
    if (isset($id)) {

    }else{
        $id=null;
    }
?>
<!-- header.php -->
<nav class="nav-container">
    <img src="https://makan.vn/wp-content/uploads/2022/11/logo-da-banh-vector-1.jpg" alt="Logo">
    <a href="{{ url('/home', $id) }}"><i class="fas fa-home"></i> Trang chủ</a>
    <a href="{{url('/select-field') }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="{{ url('/sanpham')  }}"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{url('/feedback') }}"><i class="fas fa-check"></i> Phản hồi</a>

    <script>
        function showError() {
            alert("Lỗi: Không có ID được cung cấp.");
        }
    </script>
    <!-- Profile Dropdown -->
    <?php
    if ( session('id') ) {
    ?>
        <div class="profile-dropdown">
            <a href="#" class="logout"><i class="fas fa-user"></i> Tài Khoản</a>
            <div class="dropdown-content">
                <a href="{{ url('/update-account') }}" class="logout"><i class="fas fa-exclamation-triangle"></i> Thông Tin</a>
                <a href="{{ url('/bookings') }}" class="logout"><i class="fas fa-history"></i> Lịch Sử</a>
            </div>
            <a href="{{ route('logout') }}" class="logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
        </div>
    <?php
    }else{
    ?>
        <div class="profile-dropdown">
            <a href="/login" class="logout"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a>
        </div>
    <?php
    }
    ?>

</nav>

<div class="feedback-container">
    @if($feedbackSubmitted)
        <p>Thank you for your feedback!</p>
    @endif

    <form method="post" action="{{ route('feedback.submit') }}">
        @csrf
        <label for="feedback-input">Feedback:</label>
        <textarea name="feedback-input" id="feedback-input" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit Feedback">
    </form>
    <div class="contact-info">
        <h2>Contact Information</h2>
        <p>Email: contact@example.com</p>
        <p>Phone: +1234567890</p>

    </div>
</div>
</body>

</html>
