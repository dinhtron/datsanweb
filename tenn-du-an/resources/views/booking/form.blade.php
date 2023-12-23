<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Sân</title>
    <!-- Các thẻ meta và các đường link đến các file CSS nếu cần -->
</head>
<body>
    <form method="post" action="">
        @csrf <!-- Thêm CSRF token để bảo vệ form -->
        <label for="checkin_date">Ngày Đặt Sân:</label>
        <input type="date" name="checkin_date" required><br>

        <label for="checkin_time">Giờ Check-in:</label>
        <input type="time" name="checkin_time" required><br>

        <label for="checkout_time">Giờ Check-out:</label>
        <input type="time" name="checkout_time" required><br>

        <input type="submit" value="Thêm">
    </form>

    <h2>Danh sách Sân đã đặt</h2>

    @if(!empty($bookings))
        <table border="1">
            <thead>
                <tr>
                    <th>Ngày đặt sân</th>
                    <th>Giờ Check-in</th>
                    <th>Giờ Check-out</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->checkin_date }}</td>
                        <td>{{ $booking->checkin_time }}</td>
                        <td>{{ $booking->checkout_time }}</td>
                        <td>${{ number_format($booking->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiện chưa có sân nào được đặt.</p>
    @endif

    <!-- Các đoạn mã JavaScript nếu cần -->
</body>
</html>
