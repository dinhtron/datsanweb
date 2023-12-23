<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            background-color: #333;
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
            color: white;
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
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pricing-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>
<?php
    if (isset($taikhoan)) {

    }else{
        $taikhoan=null;
        $id=null;
    }
?>
<!-- header.php -->
<nav class="nav-container">
    <img src="https://makan.vn/wp-content/uploads/2022/11/logo-da-banh-vector-1.jpg" alt="Logo">
    <a href="home.php">Trang chủ</a>
    <a href="{{ url('/select-field', $id) }}">Đặt Sân</a>
    <a href="#">Sản phẩm</a>
    <a href=" {{ url('/feedback', $id) }}/">Phản hồi</a>
    <!-- Profile Dropdown -->
    <?php
    if (isset($taikhoan)) {
    ?>
        <div class="profile-dropdown">
            <a href="#" class="logout">{{$taikhoan}}</a>
            <div class="dropdown-content">
                <a href="{{ url('/user', $id) }}" class="logout">Thông Tin</a>
                <a href="{{ url('/bookings', $id) }}" class="logout">Lịch Sử</a>
            </div>
            <a href="/home" class="logout">Đăng Xuất</a>
        </div>
    <?php
    }else{
    ?>
        <div class="profile-dropdown">
            <a href="/login" class="logout">Đăng Nhập</a>
        </div>
    <?php
    }
    ?>

</nav>
    <div class="container">
        <h2>Chào mừng đến web đặt sân</h2>

        <div class="intro-container">
            <h1>Welcome to our Soccer Field Booking Website</h1>
            <p>Experience the convenience of booking soccer fields online with our user-friendly platform. Whether you're a casual player or part of a team, our website makes it easy to find and reserve soccer fields at your preferred location. Explore our pricing options below and secure your spot for an exciting game of soccer!</p>
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

        <div class="contact-info">
            <h3>Liên hệ</h3>
            <p>Địa chỉ: 123 Đường ABC, Quận XYZ, Thành phố ABC</p>
            <p>Email: info@example.com</p>
            <p>Điện thoại: 123-456-7890</p>
        </div>
    </div>
</body>

</html>