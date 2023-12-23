<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký</title>
    <!-- Các tệp CSS và các tài nguyên khác có thể được đặt ở đây -->
</head>
<body>
    <form method="post" action="{{ url('/register') }}">
        @csrf
        <label for="tai_khoan">Tài khoản:</label>
        <input type="text" name="tai_khoan" required>

        <label for="mat_khau">Mật khẩu:</label>
        <input type="password" name="mat_khau" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Đăng Ký">
        <a href="{{ url('/login') }}">Đăng nhập</a>
    </form>
</body>
</html>
