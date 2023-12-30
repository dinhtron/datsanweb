<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 15px;
        }

        img {
            width: 100%;
            height: 300px; /* Set a fixed height for the images */
            object-fit: cover;
        }

        .product-container {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin: 20px;
        }

        .product-card {
            width: calc(22% - 20px); /* Calculate 33.33% minus margin */
            border: 1px solid #ddd;
            margin: 10px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            display: flex; /* Added */
            flex-direction: column; /* Added */
            align-items: center; /* Added */
        }

        .product-card p {
            margin: 8px 0;
        }

        .select-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
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
        .select-btn:hover {
            background-color: #45a049; /* Change to the desired hover color */
        }
    </style>
</head>

<body>
<nav class="nav-container">
    <img src="https://makan.vn/wp-content/uploads/2022/11/logo-da-banh-vector-1.jpg" alt="Logo">
    <a href="{{ url('/home', $id) }}"><i class="fas fa-home"></i> Trang chủ</a>
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
    <header>
        <h1>Danh sách sản phẩm</h1>
    </header>

    <div class="product-container">
        @php $count = 0; @endphp
        @foreach($sanpham as $sanpham)
        <div class="product-card" data-id="{{ $sanpham->id_sanpham }}">
            <img src="{{ $sanpham->hinhanh }}" alt="{{ $sanpham->tensanpham }}">
            <p><strong>Tên sản phẩm:</strong> {{ $sanpham->tensanpham }}</p>
            <p><strong>Giá:</strong> {{ $sanpham->gia }}</p>

            <button class="select-btn">Chọn</button>
        </div>
        @endforeach
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select-btn').click(function () {
                var productId = $(this).closest('.product-card').data('id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/select-product',
                    data: {
                        productId: productId,
                        _token: csrfToken
                    },
                    success: function (response) {
                        if (response.success) {
                            window.location.href = '/giohang/' + response.productId;
                        } else {
                            console.error('Lỗi chọn sản phẩm:', response.error);
                        }
                    },
                    error: function (error) {
                        console.error('Lỗi chọn sản phẩm:', error.responseText);
                    }
                });
            });
        });
    </script>
    
    <footer>
        © 2023 Your Company Name. All rights reserved.
    </footer>

</body>

</html>