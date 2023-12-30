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
        .account-settings-container {
            max-width: 400px;
            margin: 0 auto;
            }

            h2 {
                color: #333;
            }

            form {
                margin-top: 20px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }

            input {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                margin-bottom: 10px;
            }

            button {
                background-color: #4caf50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
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
    <a href="{{ url('/home', $id_user) }}"><i class="fas fa-home"></i> Trang chủ</a>
    <a href="{{ isset($id_user) ? url('/select-field') : 'javascript:showError()' }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="{{ isset($id_user) ? url('/sanpham') : 'javascript:showError()' }}"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{ isset($id_user) ? url('/feedback') : 'javascript:showError()' }}"><i class="fas fa-check"></i> Phản hồi</a>

    <script>
        function showError() {
            alert("Lỗi: Không có ID được cung cấp.");
        }
    </script>
    <!-- Profile Dropdown -->
    <?php
    if (isset($id_user)) {
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
@section('content')
    <div class="account-settings-container">
        <h2>Account Settings</h2>

        <form method="post" action="{{ route('updateAccount', ['id' => $id_user]) }}">
            @csrf

            <div class="form-group">
                <label for="new-username">Username:</label>
                <input type="text" id="new-username" name="new-username" value="{{ old('new-username', $current_taikhoan) }}" required>
            </div>

            <div class="form-group">
                <label for="new-email">Email:</label>
                <input type="email" id="new-email" name="new-email" value="{{ old('new-email', $current_email) }}" required>
            </div>
            <div class="form-group">
                <label for="so_dt">Số Điện Thoại:</label>
                <input type="tel" id="so_dt" name="so_dt" value="{{ old('so_dt', $current_so_dt) }}" required>
            </div>
            <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>

</body>

</html>
