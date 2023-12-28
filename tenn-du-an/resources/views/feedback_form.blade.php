<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            background: linear-gradient(to bottom, #FAFAD2, white);
            /* background-color: #87CEFA; */
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between; /* Hiển thị các phần tử cách đều nhau */
            align-items: center;
        }

        nav img {
            margin-left: 150px;
            width: 50px;
            height: 50px;
        }

        nav a {
            color: #00AA00;
            text-decoration: none;
            margin: 0 10px;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; /* Đảm bảo thanh điều hướng chiếm toàn bộ chiều rộng */
        }

        nav a.logout {
            margin-right: 10px;
            margin-left: 10; /* Khoảng cách giữa Đăng Xuất và Profile Dropdown */
        }

        .profile-dropdown {
            margin-left: auto; /* Đẩy sang bên phải */
            margin-right: 150px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
            padding: 10px;
        }

        .profile-dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-item:hover {
            background-color: #ddd;
        }

        .container {
            margin-bottom: 20px;
            max-width: 20;
            background-size: cover; /* Hiển thị hình nền toàn bộ */
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pricing-container {
            
            max-width: 600px;
            margin: 20px auto;
            background-color: #00FF99;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .feedback-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: center;
        }

        p {
            color: #4CAF50;
            font-weight: bold;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    </style>
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
    <a href="{{ isset($id) ? url('/select-field') : 'javascript:showError()' }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="#"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{ isset($id) ? url('/feedback') : 'javascript:showError()' }}"><i class="fas fa-check"></i> Phản hồi</a>

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
    </div>
</body>

</html>
