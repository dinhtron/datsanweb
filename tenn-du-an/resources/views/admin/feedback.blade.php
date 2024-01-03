<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <title>Admin Dashboard</title>
</head>
<style>
    h2 {
        color: #333; /* Màu chữ đen */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px; /* Khoảng cách từ tiêu đề đến bảng */
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2; /* Màu nền của header */
    }

    tr:nth-child(even) {
        background-color: #f9f9f9; /* Màu nền của các hàng chẵn */
    }
</style>
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
                    <th>Tài khoản</th>
                    <th>Email</th>
                    <th>TEXT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id_phanhoi }}</td>

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
</body>
</html>
