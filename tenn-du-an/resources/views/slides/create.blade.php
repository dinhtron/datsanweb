<!-- resources/views/slides/create.blade.php -->
<!-- resources/views/slides/create.blade.php -->
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

    form {
        max-width: 400px;
        margin: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
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
    <h2>Thêm Slide</h2>

        <form action="{{ route('slides.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Tên Slide:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="img">Ảnh Slide:</label>
            <input type="file" id="img" name="img" accept="image/*" required><br>
            <input type="hidden" id="thoigianupanh" name="thoigianupanh" value="{{ now() }}">
            <!-- Thời gian up ảnh tự động sẽ được cập nhật trong controller -->

            <button type="submit">Thêm Slide</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Admin Dashboard</p>
    </footer>
</body>
</html>