<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Nội dung head ở đây -->
</head>
<body>

    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <h2>Đăng nhập admin</h2>

        @if(isset($error))
            <p>{{ $error }}</p>
        @endif

        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng nhập</button>
    </form>
   
</body>
</html>
