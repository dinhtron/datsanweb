<!-- resources/views/select_field.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/select_field.css') }}">
    <title>User Dashboard</title>
</head>

<body>
<!-- header.php -->
@include('components.header1')
<form method="post" action="/luu-ngay" class="custom-form">
    @csrf
    <label for="ngayDuocChon" class="form-label">Chọn Ngày:</label>
    <input type="date" name="ngayDuocChon" required class="form-input" min="{{ date('Y-m-d') }}">
    <button type="submit" class="form-button">Lưu Ngày</button>
</form>

@if(session('thongbao'))
    <p class="form-message">{{ session('thongbao') }}</p>

    <form id="fieldForm" action="{{ url('/select-field') }}" method="post">
        @csrf
        <input type="hidden" name="id_user" value="{{ $id_user }}">
        <h2>Chọn sân</h2>
        <div class="field-options">
            @foreach ($fields as $field)
            <div class="field-option" data-id="{{ $field->id_sanbong }}">
                <span style="white-space: nowrap; display: block; font-weight: bold;">{{ $field->ten_sanbong }}</span>
                <span style="white-space: nowrap; display: block;">{{ $field->thongtin }}</span>
            </div>
            @endforeach
        </div>
        <input type="hidden" name="id_field" id="selectedField" value="">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fieldOptions = document.querySelectorAll('.field-option');

            fieldOptions.forEach(function (option) {
                option.addEventListener('click', function () {
                    var fieldId = option.getAttribute('data-id');
                    document.getElementById('selectedField').value = fieldId;
                    document.getElementById('fieldForm').submit();
                });
            });
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var fieldOptions = document.querySelectorAll('.field-option');

        fieldOptions.forEach(function (option) {
            option.addEventListener('click', function () {
                var fieldId = option.getAttribute('data-id');
                document.getElementById('selectedField').value = fieldId;
                document.getElementById('fieldForm').submit();
            });
        });
    });
</script>

</body>

</html>

