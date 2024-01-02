<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/slide_index.css') }}">
    

    <title>Admin Dashboard</title>
</head>
<body>
@include('admin.components.header')
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


