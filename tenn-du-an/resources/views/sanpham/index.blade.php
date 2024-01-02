<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/sanpham.css') }}">
</head>

<body>
    @include('components.header')
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
