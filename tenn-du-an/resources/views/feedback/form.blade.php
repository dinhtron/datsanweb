<!-- resources/views/feedback/form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi phản hồi</title>
</head>
<body>

@if ($userInfo)
    <form method="post" action="{{ url("/feedback/{$userInfo->id_user}") }}">
        @csrf
        <label for="taikhoan">Tài khoản:</label>
        <span>{{ $userInfo->taikhoan }}</span><br>

        <label for="email">Email:</label>
        <span>{{ $userInfo->email }}</span><br>

        <label for="thongtin_phanhou">Thông tin phản hồi:</label>
        <textarea name="thongtin_phanhou" required></textarea><br>

        <input type="submit" value="Gửi phản hồi">
    </form>
@else
    <p>Không tìm thấy thông tin người dùng.</p>
@endif

</body>
</html>
