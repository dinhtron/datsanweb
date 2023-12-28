<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Đặt Sân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            background: linear-gradient(to bottom, #FAFAD2, white);
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        nav a {
            color: #00AA00;
            text-decoration: none;
            margin: 0 10px;
        }
        nav img {
            margin-left: 150px;
            width: 50px;
            height: 50px;
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
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pricing-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: #4caf50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        p {
            color: #777;
        }
        h2 {
        text-align: center;
    }

    .booking-dates-container {

        flex-wrap: wrap;
        justify-content: space-around;
    }

    .booking-date {
        background-color: #3498db;
        color: #fff;
        cursor: pointer;
        margin: 5px;
        padding: 10px;
        border-radius: 5px;
    }


    .timeline {
            width: 100%;
            height: 20px;
            background-color: #eee;
            position: relative;
        }


    .hidden {
        display: none;
    }

    .time-bar {
        background-color: #3498db;
        height: 10px;
        margin-top: 10px;
    }
    .alert_success {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #f5c6cb;
    border-radius: 4px;
   }

    </style>
</head>

<body>
<?php
    if (isset($taikhoan)) {

    }else{
        $taikhoan=null;
        $id=null;
    }
?>
<!-- header.php -->
<nav class="nav-container">
    <img src="https://makan.vn/wp-content/uploads/2022/11/logo-da-banh-vector-1.jpg" alt="Logo">
    <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Trang chủ</a>
    <a href="{{ isset($id_user) ? url('/select-field') : 'javascript:showError()' }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="#"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{ isset($id_user) ? url('/feedback') : 'javascript:showError()' }}"><i class="fas fa-check"></i> Phản hồi</a>

    <script>
        function showError() {
            alert("Lỗi: Không có ID được cung cấp.");
        }
    </script>
    <!-- Profile Dropdown -->
    <?php
    if (isset($id_user)) {
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
<form method="post" action="">
    @if(session('bookingAdded'))
            <div class="alert_success">
                Đơn đặt sân đã được thêm thành công!
            </div>
    @endif
    @if(session('bookingAdded1'))
            <div class="alert_success">
               Thời gian không được nhập hoặc đã được đặt!
            </div>
    @endif
    @if(session('bookingAdded2'))
            <div class="alert_successoiị">
               Thời gian check out phải lớn hơn check in!
            </div>
    @endif
    @csrf <!-- Thêm CSRF token để bảo vệ form -->
 
    <label for="checkin_date"><strong>Giá Sân:{{ $giasan }} Đồng/Giờ</strong></label>
    <label for="checkin_date">Ngày Đặt Sân:</label>
    <input type="date" name="checkin_date" required min="{{ \Carbon\Carbon::now()->toDateString() }}"><br>

    <label for="checkin_time">Giờ Check-in:</label>
    <input type="time" name="checkin_time" ><br>

    <label for="checkout_time">Giờ Check-out:</label>
    <input type="time" name="checkout_time" ><br>

    <input type="submit" value="Thêm">
</form>

<script>
    function keepOnlyMinutes(input) {
        var time = input.value.split(':');
        input.value = time[0] + ':' + time[1];
    }
</script>

    <h2>Danh sách Sân đã đặt</h2>
    @if (!empty($bookings))
    @php
        // Sắp xếp mảng $bookingsByDate theo thứ tự tăng dần của ngày
        $bookingsByDate = $bookings->groupBy('checkin_date')->sortKeys();
    @endphp

    <script>
        $(document).ready(function () {
            $('.booking-date').click(function () {
                $(this).next('.booking-table').toggle();
            });
        });
    </script>

    <div class="booking-dates-container">
    @foreach ($bookingsByDate as $date => $bookingsForDate)
    @php
        $carbonDate = \Carbon\Carbon::parse($date)->setTimezone('Asia/Ho_Chi_Minh');
    @endphp

    @if ($carbonDate->isToday() || $carbonDate->isFuture())
        <div class="booking-date" onclick="toggleBookingTable(this)">
            Ngày: {{ $date }}
            <table class="booking-table" border="1">
                <thead>
                    <tr>
                        <th>Giờ Check-in</th>
                        <th>Giờ Check-out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookingsForDate as $booking)
                        <tr>
                            <td>{{ $booking->checkin_time }}</td>
                            <td>{{ $booking->checkout_time }}</td>
                            
                        </tr>
                        <!-- Timeline thêm ở đây -->
                        <tr>
                       <td colspan="2">
            <div class="timeline" id="timeline_{{ $loop->parent->index }}_{{ $loop->index }}"></div>
            <script>
                var checkinTimeStr = "2023-01-01T{{ $booking->checkin_time }}";
                var checkoutTimeStr = "2023-01-01T{{ $booking->checkout_time }}";

                // Định dạng chuỗi ngày giờ để chuyển đổi thành đối tượng Date
                var checkinTime = new Date(checkinTimeStr);
                var checkoutTime = new Date(checkoutTimeStr);

                console.log('checkinTime:', checkinTime, typeof checkinTime);
                console.log('checkoutTime:', checkoutTime, typeof checkoutTime);

                if (isNaN(checkinTime.getTime()) || isNaN(checkoutTime.getTime())) {
                    console.error('Invalid date format.');
                } else {
                    var timelineElement = document.getElementById('timeline_{{ $loop->parent->index }}_{{ $loop->index }}');
                    var width = ((checkoutTime - checkinTime) / (24 * 60 * 60 * 1000)) * 100;
                    var left = ((checkinTime - new Date("2023-01-01T00:00:00")) / (24 * 60 * 60 * 1000)) * 100;

                    console.log('width:', width);
                    console.log('left:', left);

                    timelineElement.style.background = '#3498db';
                    timelineElement.style.width = width + '%';
                    timelineElement.style.left = left + '%';
                }
            </script>
        </td>
    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endforeach

    </div>

    <script>
        function toggleBookingTable(element) {
            var bookingTable = element.querySelector('.booking-table');
            bookingTable.style.display = (bookingTable.style.display === 'none' || bookingTable.style.display === '') ? 'table' : 'none';
        }
    </script>

@else
    <p>Hiện chưa có sân nào được đặt.</p>
@endif


</body>


