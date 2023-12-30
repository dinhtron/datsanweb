<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Sản Phẩm</title>

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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        h1 {
            margin: 0;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;

            margin-top: 20px;
            margin-left: 50px; 
        }

        main > div {
            flex-basis: 48%; /* Adjust as needed */
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        #totalPrice {
            margin-top: 10px;
        }


        h2 {
            color: #333;
            margin-top: 20px;
        }

        p {
            color: #555;
        }

        img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-top: 20px;
            border-radius: 8px;
            object-fit: cover;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input {
            padding: 10px;
            font-size: 14px;
            margin: 10px 0;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 15px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        div.quantity-controls {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Add space between elements */
            width: 45%; /* Adjust to take up 50% of the width */
            margin-top: 10px; /* Add margin to the top */
            margin-left: auto; /* Align to the right */
            margin-right: auto; /* Align to the left */
        }
        div.quantity-controls button {
            padding: 10px;
            cursor: pointer;
        }

        div.quantity-controls input {
            flex: 1; /* Take up remaining space in the container */
            margin: 0 40px; /* Add margin to the left and right */
        }
        button[type="submit"] {
            width: 20%; /* Make the button 50% wide */
            margin-top: 10px; /* Add some top margin for separation */
            margin-left: auto; /* Align to the right */
            margin-right: auto; 
        }
        .alert {
            color: #fff;
            background-color: #ff6666;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        #size {
        width: 15%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        color: #333;
        margin-top: 5px;
        margin-left: auto; /* Align to the right */
        margin-right: auto; /* Align to the left */
    }

    /* You can style the dropdown arrow separately (not supported in all browsers) */
    #size::-ms-expand {
        display: none;
    }

    #size:disabled {
        background-color: #f0f0f0;
        color: #999;
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
        <h1>Thông Tin Sản Phẩm</h1>
    </header>

    <main>
        <div>
            <img src="{{ $sanpham->hinhanh }}" alt="{{ $sanpham->tensanpham }}">
        </div>
        <div>
            <h2>{{ $sanpham->tensanpham }}</h2>
            <p id="productPrice">Giá: {{ $sanpham->gia }}</p>
            <form method="POST" action="{{ url('/giohang/dat-don/' . $sanpham->id_sanpham) }}" id="orderForm" onsubmit="return confirmOrder()">

                @csrf
                <label for="soluong">Số lượng:</label>
                <div class="quantity-controls">
                    <button type="button" onclick="decrementQuantity()">-</button>
                    <input type="number" id="soluong" name="soluong" value="1" min="1" oninput="updateTotalPrice()">
                    <button type="button" onclick="incrementQuantity()">+</button>
                </div>
                <select id="size" name="size">
                  <option value="S">S</option>
                  <option value="M" selected>M</option>
                  <option value="L">L</option>
                </select>
                <p id="totalPrice">Tổng giá: {{ $sanpham->gia }}</p>
                
                <button type="submit" >Mua</button>

            </form>
            @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>


    </main>

    <footer>
        © 2023 Your Company Name. All rights reserved.
    </footer>
    <script>
        function updateTotalPrice() {
            var quantity = document.getElementById('soluong').value;
            var unitPrice = {{ $sanpham->gia }};
            var totalPrice = quantity * unitPrice;

            document.getElementById('totalPrice').innerHTML = 'Tổng giá: ' + totalPrice;
        }

        function incrementQuantity() {
            var input = document.getElementById('soluong');
            var value = parseInt(input.value, 10);
            input.value = value + 1;
            updateTotalPrice();
        }

        function decrementQuantity() {
            var input = document.getElementById('soluong');
            var value = parseInt(input.value, 10);
            if (value > 1) {
                input.value = value - 1;
                updateTotalPrice();
            }
        }
        function confirmOrder() {
    var confirmation = confirm("Xác nhận đặt đơn hàng?");
    if (confirmation) {
        document.getElementById("orderForm").submit();
    } else {
        window.location.reload();
        return false; // Thêm dòng này để ngăn chặn sự kiện submit khi hủy
    }
    }
    </script>


</body>

</html>
