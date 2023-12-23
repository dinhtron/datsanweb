<!-- resources/views/user_info.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <style>
        /* Thêm các style của bạn nếu cần thiết */
    </style>
</head>
<body>
    <h2>Thông tin người dùng</h2>

    @if ($user)
        <p>Tên Người Dùng: {{ $user->taikhoan }}</p>
        <p>Email: {{ $user->email }}</p>
    @else
        <p>Không tìm thấy người dùng.</p>
    @endif
</body>
</html>
