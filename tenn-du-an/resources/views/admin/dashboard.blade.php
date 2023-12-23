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
