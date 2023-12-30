<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <h2>Thêm Sản Phẩm</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

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
</body>
</html>
