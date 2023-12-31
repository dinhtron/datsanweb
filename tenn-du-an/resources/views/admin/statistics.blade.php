
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <style>
                #main-content {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
            flex-direction: row; /* Hiển thị các ô nằm ngang */
            justify-content: space-between; /* Canh chỉnh khoảng cách giữa các ô */
        }

        .stat-box {
            border: 1px solid #ddd;
            padding: 20px;
            flex: 1; /* Ô mở rộng theo chiều ngang */
            margin-right: 10px; /* Khoảng cách giữa các ô */
            border-radius: 5px;
            text-align: center;
        }

        /* Màu sắc cho từng ô thống kê */
        .stat-box:nth-child(1) {
            background-color: #63a69f;
            color: #fff;
        }

        .stat-box:nth-child(2) {
            background-color: #f8c15d;
            color: #fff;
        }

        .stat-box:nth-child(3) {
            background-color: #ea6d6d;
            color: #fff;
        }
                    </style>
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.components.header')
    <section id="main-content">
    <div class="stat-box">
        <p>Người dùng</p>
        <p> {{ $totalUsers }}</p>
    </div>

    <div class="stat-box">
        <p>Doanh Thu</p>
        <p> {{ number_format($totalPrice, 0, ',', '.') }} Đồng</p>
    </div>

    <div class="stat-box">
        <p>Số Sân</p>
        <p> {{ $totalSanbong }}</p>
    </div>
</section>

    <footer>
        <p>&copy; 2023 Admin Dashboard</p>
    </footer>
</body>
</html>