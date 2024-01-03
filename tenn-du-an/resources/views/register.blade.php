<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;

    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px; /* Điều chỉnh độ rộng của form */
    margin-left: auto; /* Đẩy sang phải */
    margin-right: 500px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a {
    display: block;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
    color: #333;
}

a:hover {
    text-decoration: underline;
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
    <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Trang chủ</a>
    <a href="{{ isset($id) ? url('/select-field') : 'javascript:showError()' }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="{{ isset($id) ? url('/sanpham') : 'javascript:showError()' }}"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{ isset($id) ? url('/feedback') : 'javascript:showError()' }}"><i class="fas fa-check"></i> Phản hồi</a>

    <script>
        function showError() {
            alert("Lỗi: Không có ID được cung cấp.");
        }
    </script>
    <!-- Profile Dropdown -->
    <?php
    if (isset($id)) {
    ?>
        <div class="profile-dropdown">
            <a href="#" class="logout"><i class="fas fa-user"></i> Tài Khoản</a>
            <div class="dropdown-content">
                <a href="{{ url('/update-account', $id) }}" class="logout"><i class="fas fa-exclamation-triangle"></i> Thông Tin</a>
                <a href="{{ url('/bookings', $id) }}" class="logout"><i class="fas fa-history"></i> Lịch Sử</a>
            </div>
            <a href="/home" class="logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
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
    <form method="post" action="{{ url('/register') }}">
        @csrf
        <h2>Đăng Kí</h2>
        @csrf
        <label for="tai_khoan">Tài khoản:</label>
        <input type="text" name="tai_khoan" required>

        <label for="mat_khau">Mật khẩu:</label>
        <input type="password" name="mat_khau" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="so_dt">Số điện thoại:</label>
        <input type="tel" name="so_dt" pattern="[0-9]{10}" required>
        <label for="dia_chi">Địa Chỉ</label>
        <input type="text" name="dia_chi"  required>

        <input type="submit" value="Đăng Ký">
        <a href="{{ url('/login') }}">Đăng nhập</a>
    </form>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</body>
</html>
