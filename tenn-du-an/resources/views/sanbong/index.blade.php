
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h2 {
        color: #333;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    form {
        margin-top: 20px;
        max-width: 400px;
        margin: 20px auto;
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
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
            <li><a href="#">Dashboard</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li><a href="/admin/donhang">Products</a></li>
            <li><a href="/admin/sanbong">Sân Bóng</a></li>
            <li><a href="/admin/feedback">Phản hồi</a></li>
        </ul>
    </nav>

    <section id="main-content">
     
<table>
    <h2>Quản Lí Sân Bóng</h2>
    <tr>
        <th>ID</th>
        <th>Giá Sân</th>
        <th>Tên Sân Bóng</th>
        <th>Mô tả</th>
        <th>Xóa</th>
    </tr>
    @foreach ($sanbongs as $sanbong)
        <tr>
            <td>{{ $sanbong->id_sanbong }}</td>
            <td>{{ $sanbong->giasan }}</td>
            <td>{{ $sanbong->ten_sanbong }}</td>
            <td>{{ $sanbong->thongtin }}</td>
            <td><a href="{{ url('/delete-san-bong', $sanbong->id_sanbong) }}">Xóa</a></td>
        </tr>
    @endforeach
</table>

<!-- Form thêm sân bóng -->
<form method="post" action="{{ url('/add-san-bong') }}">
    @csrf
    <h2>Thêm Sân Bóng Mới</h2>
    <label for="ten_sanbong">Tên Sân Bóng:</label>
    <input type="text" name="ten_sanbong" required>
    <label for="giasan">Giá Sân:</label>
    <input type="text" name="giasan" required>
    <label for="thongtin">Mô Tả:</label>
    <input type="text" name="thongtin" required>
    <label for="opening_time">Thời Gian Mở Cửa:</label>
    <input type="time" name="opening_time" required>

    <label for="closing_time">Thời Gian Đóng Cửa:</label>
    <input type="time" name="closing_time" required>
    <button type="submit">Thêm Sân Bóng</button>
</form>

    </section>

</body>
</html>