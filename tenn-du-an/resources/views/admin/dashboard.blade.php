<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
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
    @include('admin.components.header')

    <section id="main-content">
    @section('content')

    @if (!empty($bookings))
    <h2>Đơn Đặt Sân Mới</h2>
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
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($bookings->where('checkin_date', '>=', \Carbon\Carbon::now()->toDateString()) as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->taikhoan }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->checkin_date }}</td>
                <td>{{ $booking->checkin_time }}</td>
                <td>{{ $booking->checkout_time }}</td>
                <td>{{ number_format($booking->price, 0, ',', '.') }} VNĐ</td>
                <td>
                    <form action="{{ route('booking.delete', $booking->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hủy Đơn</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Đơn đặt sân cũ</h2>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings->where('checkin_date', '<', \Carbon\Carbon::now()->toDateString()) as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->taikhoan }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->checkin_date }}</td>
                    <td>{{ $booking->checkin_time }}</td>
                    <td>{{ $booking->checkout_time }}</td>
                    <td>{{ number_format($booking->price, 0, ',', '.') }} VNĐ</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Hiện chưa có sân nào được đặt.</p>
    @endif

    </section>

</body>
