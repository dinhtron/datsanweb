<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    padding: 0;
                }

                header {
                    background-color: #333;
                    color: #fff;
                    text-align: center;
                    padding: 1em 0;
                }

                nav {
                    background-color: #555;
                }

                nav ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                }

                nav a {
                    text-decoration: none;
                    color: #fff;
                    padding: 1em;
                    display: block;
                }

                nav a:hover {
                    background-color: #777;
                }

                #main-content {
                    padding: 2em;
                }

                footer {
                    background-color: #333;
                    color: #fff;
                    text-align: center;
                    padding: 1em 0;
                    position: fixed;
                    bottom: 0;
                    width: 100%;
                }
                /* Tùy chỉnh cho bảng */
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                /* Tùy chỉnh cho nút Xóa và Thay đổi trạng thái */
                button {
                    background-color: #4caf50;
                    color: #fff;
                    padding: 8px 16px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #45a049;
                }

                /* Tùy chỉnh cho thông báo khi không có người dùng */
                p {
                    color: #555;
                }


                    </style>
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li><a href="/admin/donhang">Products</a></li>
            <li><a href="/admin/sanbong">Sân Bóng</a></li>
            <li><a href="/admin/feedback">Phản hồi</a></li>
        </ul>
    </nav>

    <section id="main-content">
    @section('content')
    <h2>Đơn hàng</h2>

    @if (!empty($bookings))
        <table border="1">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Tài khoản</th>
                    <th>Email</th>
                    <th>Ngày đặt sân</th>
                    <th>Giờ Check-in</th>
                    <th>Giờ Check-out</th>
                    <th>Giá</th>
                    <th>ID người đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->taikhoan }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->checkin_date }}</td>
                        <td>{{ $booking->checkin_time }}</td>
                        <td>{{ $booking->checkout_time }}</td>
                        <td>{{ $booking->price }}</td>
                        <td>{{ $booking->id_user }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiện chưa có sân nào được đặt.</p>
    @endif

    </section>

</body>
