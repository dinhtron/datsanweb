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
        .box{
            
            display: flex;
           justify-content: space-between; /* Điều chỉnh theo nhu cầu */
            margin-left: 50px;
        }
        .price-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .price-table th,
        .price-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .price-table th {
            background-color: #333;
            color: white;
        }

        .price-table tr:hover {
            background-color: #f5f5f5;
        }

        .intro-container {
             margin-bottom: 200px;
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        .contact-info {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            text-align: center;
        }
  


        .slider {

            position: relative;
            width: 100%;
            max-width: 100%; /* Adjust the maximum width as needed */
            margin: auto;
        }

        .slider img {
            margin-top: 50px;
            width: 100%;
            height: auto;
            display: none;
        }
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

<div class="box">
    <div class="container">
    <div class="slider">
            <img src="images/slide2.jpg" alt="Ảnh">
            <img src="images/OIG.jpg" alt="Ảnh">     
    </div>
    </div>
    <div class="container">

        <div class="intro-container">
            <h1>Welcome to our Soccer Field Booking Website</h1>
        </div>

        <div class="pricing-container">
            <h2>Soccer Field Price List</h2>
            <h2>User ID: {{ $id }}</h2>
            <table class="price-table">
                <thead>
                    <tr>
                        <th>Field Type</th>
                        <th>Price per Hour</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Grass Field</td>
                        <td>$20</td>
                    </tr>
                    <tr>
                        <td>Artificial Turf</td>
                        <td>$25</td>
                    </tr>
                    <tr>
                        <td>Indoor Field</td>
                        <td>$30</td>
                    </tr>
                    <!-- Add more rows for additional field types -->
                </tbody>
            </table>
        </div>

 
    </div>
    </div>
           <div class="contact-info">
            <h3>Liên hệ</h3>
            <p>Địa chỉ: 123 Đường ABC, Quận XYZ, Thành phố ABC</p>
            <p>Email: info@example.com</p>
            <p>Điện thoại: 123-456-7890</p>
        </div>
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector(".slider");
        const images = document.querySelectorAll(".slider img");

        let currentIndex = 0;

        function showImage(index) {
            images.forEach((img, i) => {
                img.style.display = i === index ? "block" : "none";
            });
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }

        // Set an interval to switch images every 3 seconds (adjust as needed)
        setInterval(nextImage, 5000);

        // Show the initial image
        showImage(currentIndex);
    });
             
        </script>
</body>

</html>