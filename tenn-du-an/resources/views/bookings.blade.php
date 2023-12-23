<!-- resources/views/bookings.blade.php -->

@section('content')
    <h2>Danh sách Sân đã đặt</h2>

    @if (!empty($bookings))
        <table border="1">
            <thead>
                <tr>
                    <th>Ngày đặt sân</th>
                    <th>Giờ Check-in</th>
                    <th>Giờ Check-out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking['checkin_date'] }}</td>
                        <td>{{ $booking['checkin_time'] }}</td>
                        <td>{{ $booking['checkout_time'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiện chưa có sân nào được đặt.</p>
    @endif

