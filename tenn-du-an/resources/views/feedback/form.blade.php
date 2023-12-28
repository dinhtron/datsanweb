@section('content')
    <p>Tài khoản: {{ $user->taikhoan }}</p>
    <p>Email: {{ $user->email }}</p>

    <form method="post" action="{{ route('feedback.submit', ['id_user' => $user->id]) }}">
        @csrf
        <label for="thongtin_phanhoi">Thông tin phản hồi:</label>
        <textarea name="thongtin_phanhoi" id="thongtin_phanhoi" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Gửi phản hồi">
    </form>
@endsection
