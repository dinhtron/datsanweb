

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

                #main-content {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            flex-direction: row; /* Hiển thị các ô nằm ngang */
            justify-content: space-between; /* Canh chỉnh khoảng cách giữa các ô */
        }

        .stat-box {
            border: 1px solid #ddd;
            padding: 20px;
            flex: 1; /* Ô mở rộng theo chiều ngang */
            margin-right: 10px; /* Khoảng cách giữa các ô */
            border-radius: 5px;
            text-align: center;
        }

        /* Màu sắc cho từng ô thống kê */
        .stat-box:nth-child(1) {
            background-color: #63a69f;
            color: #fff;
        }

        .stat-box:nth-child(2) {
            background-color: #f8c15d;
            color: #fff;
        }

        .stat-box:nth-child(3) {
            background-color: #ea6d6d;
            color: #fff;
        }
                    </style>
        <style>
    h2 {
        color: #333;
    }


    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    img {
        max-width: 100px;
        max-height: 100px;
    }

    button {
        background-color: #ff3333;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #cc0000;
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
        <!-- resources/views/slides/index.blade.php -->

<!-- resources/views/slides/index.blade.php -->
<h2>Danh sách Slide</h2>
<a href="{{ route('slides.create') }}">Thêm Slide Mới</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên Slide</th>
        <th>Hình Ảnh</th>
        <th>Thời Gian Upload Ảnh</th>
        <th>Xóa</th>
    </tr>
    @foreach ($slides as $slide)
        <tr>
            <td>{{ $slide->id }}</td>
            <td>{{ $slide->name }}</td>
            <td>
            <img src="{{ asset('storage/' . $slide->img) }}" alt="Hình ảnh của {{ $slide->name }}" style="max-width: 100px; max-height: 100px;">

            <td>{{ $slide->thoigianupanh }}</td>
            <td>
                <form action="{{ route('slides.destroy', $slide->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
    </section>

</body>
</html>


