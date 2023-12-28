
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

    align-items: center;
    justify-content: center;
    height: 100vh;
}

nav {
    background: linear-gradient(to bottom, #FAFAD2, white);
    padding: 10px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
}


nav a {
    color: #00AA00;
    text-decoration: none;
    margin: 0 10px;
}
nav img {
    margin-left: 150px;
    width: 50px;
    height: 50px;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

nav a.logout {
    margin-right: 10px;
    margin-left: 10px;
}

.profile-dropdown {
    margin-left: auto;
    margin-right: 150px;
    position: relative; /* Để đặt vị trí tuyệt đối cho dropdown-content */
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

.container, .pricing-container, .intro-container {
    max-width: 800px;
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

.price-table th, .price-table td {
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

.contact-info {
    margin-top: 20px;
    border-top: 1px solid #ddd;
    padding-top: 20px;
    text-align: center;
}

h2 {
    text-align: center;
}

form {
    width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left: auto; /* Đẩy sang phải */
    margin-right: 500px;
    margin-top: 50px;
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

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

p {
    color: #d9534f;
    text-align: center;
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
    <a href="{{ isset($id) ? url('/select-field', $id) : 'javascript:showError()' }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="#"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{ isset($id) ? url('/feedback', $id) : 'javascript:showError()' }}"><i class="fas fa-check"></i> Phản hồi</a>

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

<form action="{{ url('/login') }}" method="post">
    @csrf
        <h2>Đăng Nhập</h2>
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <br>

    <button type="submit">Login</button>
    <a href="/register"> Đăng kí</a>
    @if(session('error'))
    <script>
        function showError() {
            alert("Lỗi: {!! session('error') !!}");
        }

        // Gọi hàm hiển thị lỗi khi trang được tải
        window.onload = showError;
    </script>
    @endif

</form>
</body>

