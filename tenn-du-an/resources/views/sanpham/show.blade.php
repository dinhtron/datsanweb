<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user/sanpham_show.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Thông Tin Sản Phẩm</title>


</head>

<body>
@include('components.header')
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
