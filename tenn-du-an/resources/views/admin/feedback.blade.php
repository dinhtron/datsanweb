<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    padding: 0;
                }

                header {
                    background-color: #333;
                    color: #fff;
                    text-align: center;
                    padding: 1em 0;
                }

                nav {
                    background-color: #555;
                }

                nav ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                }

                nav a {
                    text-decoration: none;
                    color: #fff;
                    padding: 1em;
                    display: block;
                }

                nav a:hover {
                    background-color: #777;
                }

                #main-content {
                    padding: 2em;
                }

                footer {
                    background-color: #333;
                    color: #fff;
                    text-align: center;
                    padding: 1em 0;
                    position: fixed;
                    bottom: 0;
                    width: 100%;
                }

                    </style>
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li><a href="/products">Sản Phẩm</a></li>
            <li><a href="/admin/donhang">Products</a></li>
            <li><a href="/admin/sanbong">Sân Bóng</a></li>
            <li><a href="/admin/feedback">Phản hồi</a></li>
            <li><a href="/slides">Quảng Bá</a></li>
        </ul>
    </nav>

    <section id="main-content">
    @section('content')
    <h2>Phản hồi</h2>

    @if (!empty($feedbacks))
        <table border="1">
            <thead>
                <tr>
                    <th>Mã phản hồi</th>
                    <th>ID người phản hồi</th>
                    <th>Tài khoản</th>
                    <th>Email</th>
                    <th>TEXT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id_phanhoi }}</td>
                        <td>{{ $feedback->id_user }}</td>
                        <td>{{ $feedback->taikhoan }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->thongtin_phanhoi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiện chưa có phản hồi nào.</p>
    @endif

    </section>

    <footer>
        <p>&copy; 2023 Admin Dashboard</p>
    </footer>
</body>
</html>
