<!-- resources/views/products/all-in-one.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <style>

                #main-content {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
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
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
        color: #333;
    }

    a {
        text-decoration: none;
        color: white;
        padding: 8px 12px;
        margin-right: 5px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    a:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    img {
        max-width: 100px;
        max-height: 100px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    button {
        background-color: #e74c3c;
        color: white;
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
            color: #2980b9;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }

        .confirm-delete {
            color: red;
            cursor: pointer;
        }

        .confirm-delete:hover {
            text-decoration: underline;
        }
        
                    </style>
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.components.header')
    <section>
    <h2>Quản Lý Sản Phẩm</h2>
    
    {{-- Form thêm sản phẩm --}}
    <h3>Thêm Sản Phẩm</h3>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label for="tensanpham">Tên Sản Phẩm:</label>
        <input type="text" id="tensanpham" name="tensanpham" required><br>

        <label for="gia">Giá Sản Phẩm:</label>
        <input type="number" id="gia" name="gia" step="0.01" required><br>

        <label for="hinhanh">Đường Dẫn Hình Ảnh:</label>
        <input type="text" id="hinhanh" name="hinhanh" required><br>

        <button type="submit">Thêm Sản Phẩm</button>
    </form>

    {{-- Form sửa sản phẩm --}}
    @if(isset($product))
        <h3>Sửa Sản Phẩm</h3>
        <form action="{{ route('products.update', ['id' => $product->id_sanpham]) }}" method="post">
            @csrf
            <label for="tensanpham">Tên Sản Phẩm:</label>
            <input type="text" id="tensanpham" name="tensanpham" value="{{ $product->tensanpham }}" required><br>

            <label for="gia">Giá Sản Phẩm:</label>
            <input type="number" id="gia" name="gia" step="0.01" value="{{ $product->gia }}" required><br>

            <label for="hinhanh">Đường Dẫn Hình Ảnh:</label>
            <input type="text" id="hinhanh" name="hinhanh" value="{{ $product->hinhanh }}" required><br>

            <button type="submit">Cập Nhật Sản Phẩm</button>
        </form>
    @endif
    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    {{-- Danh sách sản phẩm --}}
    <h3>Danh Sách Sản Phẩm</h3>
    <table border="1">
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Hành Động</th>
            <th> Ảnh </th>
        </tr>
        @foreach($products as $product1)
            <tr>
                <td>{{ $product1->tensanpham }}</td>
                <td>{{ $product1->gia }}</td>
                <td>
                    <a href="{{ route('products.edit', ['id' => $product1->id_sanpham]) }}">Sửa</a> |
                    <a href="{{ route('products.destroy', ['id' => $product1->id_sanpham]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>
                </td>
                  
                <td>
                <img src="{{ $product1->hinhanh }}" alt="">
                </td>
            </tr>
        @endforeach
    </table>


</section>

</body>
</html>

    
