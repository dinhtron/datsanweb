<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/booking.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Đặt Sân</title>

</head>
<style>

.confirmation-dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff; 
    padding: 200px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    text-align: center;
}

.confirmation-dialog p {
    margin-bottom: 20px;
    font-size: 18px;
}

.confirmation-dialog button {
    padding: 15px;
    margin: 0 10px;
    cursor: pointer;
    background-color: #4CAF50; /* Màu nền nút */

    border: none;
    border-radius: 5px;
}

.confirmation-dialog button:hover {
    background-color: #e0e0e0; /* Màu nền nút khi hover */
}


</style>
<body>
<?php
    if (isset($taikhoan)) {

    }else{
        $taikhoan=null;
        $id=null;
    }
?>
<!-- header.php -->
@include('components.header1')
<form method="post" id="yourFormId" action="" onsubmit="return showConfirmation()" autocomplete="off">
    @csrf
    @if(session('bookingAdded'))
        <div class="alert_success" id="bookingSuccess">
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
    @if(session('bookingAdded3'))
            <div class="alert_successoiị">
               Thời gian sân đóng cửa!
            </div>
    @endif
     <!-- Thêm CSRF token để bảo vệ form -->
 
    <label for="checkin_date"><strong>Giá Sân: {{ number_format($giasan, 0, ',', '.') }} Đồng/Giờ</strong></label>
    <label for="checkin_date">Ngày Đặt Sân:</label>
    <input type="date" name="checkin_date" required min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ session('ngayDuocChon') ? session('ngayDuocChon')->toDateString() : '' }}" readonly><br>
    <label for="checkin_time">Giờ Check-in:</label>
    <input type="time" name="checkin_time" required="calculatePrice();"><br>
    <label for="checkout_time">Giờ Check-out:</label>
    <input type="time" name="checkout_time" id="checkout_time" required onchange="calculatePrice();"><br>
    <input type="submit" value="Thêm">
    <div id="calculatedPrice"></div>
</form>
<script>
    window.onload = function () {
        document.getElementById("yourFormId").reset(); // Đặt ID của biểu mẫu của bạn
    };
</script>

<script>
    function showConfirmation() {
        // Tạo một div để tùy chỉnh giao diện hộp thoại xác nhận
        var confirmationDialog = document.createElement('div');
        confirmationDialog.className = 'confirmation-dialog';
        confirmationDialog.innerHTML = `
            <p>Xác nhận đặt sân?</p>
            <button onclick="confirmAction()">Đồng ý</button>
            <button onclick="cancelAction()">Hủy</button>
        `;

        // Thêm div vào body
        document.body.appendChild(confirmationDialog);

        // Ngăn chặn việc submit form
        return false;
    }

    function confirmAction() {
        // Xử lý khi người dùng đồng ý
        document.querySelector('form').submit();
    }

    function cancelAction() {
        // Xử lý khi người dùng hủy
        document.querySelector('.confirmation-dialog').remove();
    }
</script>
<script>
   function calculatePrice() {
            // Lấy giờ check-in và check-out
            var checkinTime = document.getElementsByName("checkin_time")[0].value;
            var checkoutTime = document.getElementById("checkout_time").value;

            // Thực hiện logic tính giá của bạn ở đây
            var price = calculatePriceLogic(checkinTime, checkoutTime);

            // Hiển thị giá tính toán trên màn hình
            var calculatedPriceDiv = document.getElementById("calculatedPrice");
            if(price.toFixed(2)>0){
                calculatedPriceDiv.innerHTML = "Giá Tiền: " + price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
            }
                
            else{
                calculatedPriceDiv.innerHTML= "Xin vui lòng đặt lại vì đã bao gồm giờ nghĩ của sân hoặc giờ checin trước giờ check out"
            }
            

            // Tạo trường input ẩn để lưu giá tính toán
            var hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "price";
            hiddenInput.value = price;

            // Xóa bất kỳ trường input ẩn đã thêm trước đó (tuỳ chọn)
            var existingInput = document.getElementsByName("price")[0];
            if (existingInput) {
                existingInput.parentNode.removeChild(existingInput);
            }

            // Thêm trường input ẩn vào form
            document.forms[0].appendChild(hiddenInput);
        }
        function calculatePriceLogic(checkinTime, checkoutTime) {

            var rate = {{ $giasan }}; // Thay thế bằng mức giá thực tế của bạn
            var diffInHours = calculateHourDifference(checkinTime, checkoutTime);

            return rate * diffInHours;
        }

        function calculateHourDifference(start, end) {
            var startTime = new Date("2000-01-01 " + start);
            var endTime = new Date("2000-01-01 " + end);

            // Tính hiệu số giờ chênh lệch
            var diffInMilliseconds = endTime - startTime;
            var diffInHours = diffInMilliseconds / (1000 * 60 * 60);

            return diffInHours;
        }
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
    <table class="booking-table" border="1" style='display: none'>
        <tbody>
            @foreach ($bookingsForDate as $booking)
                <tr></tr>
                <tr>
                    <td colspan="24">
                        <div class="timeline" id="timeline_{{ $loop->parent->index }}_{{ $loop->index }}"></div>
                        <div class="time-labels" id="time_labels_{{ $loop->parent->index }}_{{ $loop->index }}"></div>
     

                        <script>
                            function padZero(number) {
    return number < 10 ? `0${number}` : number;
}

    var checkinTimeStr = "2023-01-01T{{ $booking->checkin_time }}";
    var checkoutTimeStr = "2023-01-01T{{ $booking->checkout_time }}";

    var checkinTime = new Date(checkinTimeStr);
    var checkoutTime = new Date(checkoutTimeStr);

    if (isNaN(checkinTime.getTime()) || isNaN(checkoutTime.getTime())) {
        console.error('Invalid date format.');
    } else {
        var timelineElement = document.getElementById('timeline_{{ $loop->parent->index }}_{{ $loop->index }}');

        var width = ((checkoutTime - checkinTime) / (24 * 60 * 60 * 1000)) * 100;
        var left = ((checkinTime - new Date("2023-01-01T00:00:00")) / (24 * 60 * 60 * 1000)) * 100;

        timelineElement.style.background = '#b8e994';
        timelineElement.style.width = width + '%';
        timelineElement.style.left = left + '%';

        // Add time label directly on the timeline
        var timeLabel = document.createElement('div');
        timeLabel.className = 'time-label';
        timeLabel.innerText = `${padZero(checkinTime.getHours())}:${padZero(checkinTime.getMinutes())} - ${padZero(checkoutTime.getHours())}:${padZero(checkoutTime.getMinutes())}`;
        timeLabel.style.fontWeight = 'bold';
        timeLabel.style.position = 'absolute';
        timeLabel.style.left = left + '%';

        // Check if there is enough space for the time label
        if (left >= 0 && (left + width) <= 100) {
            timelineElement.appendChild(timeLabel);
        }
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


