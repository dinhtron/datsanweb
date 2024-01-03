<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/thongtin.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>

</head>

<body>
<!-- header.php -->
@include('components.header1')
@section('content')
    <div class="account-settings-container">
        <h2>Account Settings</h2>

        <form method="post" action="{{ route('updateAccount', ['id' => $id_user]) }}">
            @csrf

            <div class="form-group">
                <label for="new-username">Username:</label>
                <input type="text" id="new-username" name="new-username" value="{{ old('new-username', $current_taikhoan) }}" required>
            </div>

            <div class="form-group">
                <label for="new-email">Email:</label>
                <input type="email" id="new-email" name="new-email" value="{{ old('new-email', $current_email) }}" required>
            </div>
            <div class="form-group">
                <label for="so_dt">Số Điện Thoại:</label>
                <input type="tel" id="so_dt" name="so_dt" value="{{ old('so_dt', $current_so_dt) }}" required>
            </div>
            <div class="form-group">
                <label for="dia_chi">Địa Chỉ:</label>
                <input type="text" id="dia_chi" name="dia_chi" value="{{ old('dia_chi', $current_dia_chi) }}" required>
            </div>
            <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>

            <button type="submit">Lưu Sửa Đổi</button>
        </form>
    </div>

</body>

</html>
