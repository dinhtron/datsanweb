<!-- resources/views/select_field.blade.php -->


<body>
    <form action="{{ url('/select-field') }}" method="post">
        @csrf
        <input type="hidden" name="id_user" value="{{ $id_user }}">
        <label for="field">Chọn Sân:</label>
        <select name="id_field" id="field">
            @foreach ($fields as $field)
                <option value="{{ $field->id_sanbong }}">{{ $field->ten_sanbong }}</option>
            @endforeach
        </select>
        <input type="submit" value="Chọn">
    </form>
</body>
</html>
