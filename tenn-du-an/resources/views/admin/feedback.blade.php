<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.components.header')
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
