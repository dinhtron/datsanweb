<!-- resources/views/bookings.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/bookings.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>

     <script>
        // Add this JavaScript to toggle the visibility of the product list
        function toggleProductList() {
            var productList = document.getElementById("productList");
            var productList1 = document.getElementById("productList1");

            productList.style.display = (productList.style.display === "none") ? "block" : "none";
            productList1.style.display = "none";
        }

        function toggleProductList1() {
            var productList = document.getElementById("productList");
            var productList1 = document.getElementById("productList1");

            productList1.style.display = (productList1.style.display === "none") ? "block" : "none";
            productList.style.display = "none";
        }
   
    </script>
</head>
<body>
    @include('components.header1')
    @section('content')
    <div class="button-container">
            <button onclick="toggleProductList1()">Lịch Sử Đặt Sân</button>
            <button onclick="toggleProductList()">Lịch Sử Đặt Sản Phẩm</button>
        </div>
        <div class="container" id="productList1" style="display: none">
            <h2>Danh sách Sân đã đặt</h2>

            @if (!empty($donhang))
    @php
        // Tạo một mảng để nhóm các đơn hàng theo ngày
        $groupedBookings = [];

        foreach ($bookings as $booking) {
            $groupedBookings[$booking['checkin_date']][] = $booking;
        }

        // Sắp xếp các ngày theo thứ tự giảm dần
        krsort($groupedBookings);
    @endphp

    @foreach ($groupedBookings as $date => $group)
        <table border="1">
            <caption>Ngày đặt sân: {{ $date }}</caption>
            <thead>
                <tr>
                    <th>Giờ Check-in</th>
                    <th>Giờ Check-out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group as $booking)
                    <tr>
                        <td>{{ $booking['checkin_time'] }}</td>
                        <td>{{ $booking['checkout_time'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

            @else
                <p>Hiện chưa có sân nào được đặt.</p>
            @endif
        </div>

        <div class="container" id="productList" style="display: none">
            <h2>Danh sách Sản phẩm đã đặt</h2>

            @if (!empty($donhang))
                <table border="1">
                    <thead>
                        <tr>
                            <th>Tên Đơn Hàng</th>
                            <th>Số Lượng</th>
                            <th>Tổng Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donhang as $donhang)
                            <tr>
                                <td>{{ $donhang->tendonhang }}</td>
                                <td>{{ $donhang->soluong }}</td>
                                <td>{{ $donhang->gia }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Hiện chưa có sản phẩm nào được đặt.</p>
            @endif
        </div>
    </body>

    </html>