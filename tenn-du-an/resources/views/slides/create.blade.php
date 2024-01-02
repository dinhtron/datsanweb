<!-- resources/views/slides/create.blade.php -->
<!-- resources/views/slides/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/slide.css') }}">
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.components.header')
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