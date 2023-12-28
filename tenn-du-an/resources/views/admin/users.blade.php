<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                /* Tùy chỉnh cho bảng */
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
                    background-color: #f2f2f2;
                }

                /* Tùy chỉnh cho nút Xóa và Thay đổi trạng thái */
                button {
                    background-color: #4caf50;
                    color: #fff;
                    padding: 8px 16px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #45a049;
                }

                /* Tùy chỉnh cho thông báo khi không có người dùng */
                p {
                    color: #555;
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
            <li><a href="/admin/donhang">Products</a></li>
            <li><a href="/admin/sanbong">Sân Bóng</a></li>
            <li><a href="/admin/feedback">Phản hồi</a></li>
        </ul>
    </nav>

    <section id="main-content">
    @section('content')
    <h2>Danh sách Người Dùng</h2>

    @if (!empty($users))
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Trạng Thái</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr id="userRow_{{ $user->id_user }}">
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->taikhoan }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <button onclick="changeStatus({{ $user->id_user }}, '{{ $user->trangthai }}')">
                                {{ $user->trangthai }}
                            </button>
                        </td>
                        <td>
                            <button onclick="deleteUser({{ $user->id_user }})">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hiện chưa có người dùng nào.</p>
    @endif

    <script>
        function deleteUser(userId) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa người dùng này?");
            if (confirmation) {
                axios.delete('/admin/users/' + userId)
                    .then(function(response) {
                        document.getElementById('userRow_' + userId).remove();
                        alert(response.data.message);
                    })
                    .catch(function(error) {
                        console.error(error);
                        alert('Lỗi xóa người dùng');
                    });
            }
        }

        function changeStatus(userId, currentStatus) {
            var newStatus = (currentStatus === 'hoatdong') ? 'khonghoatdong' : 'hoatdong';
            var confirmation = confirm("Bạn có chắc chắn muốn thay đổi trạng thái này? +{$userId}");
            if (confirmation) {
                axios.patch('/admin/users/' + userId + '/' + newStatus)
                    .then(function(response) {
                        var statusButton = document.getElementById('userStatus_' + userId);
                        statusButton.innerHTML = '<button onclick="changeStatus(' + userId + ', \'' + newStatus + '\')">' + newStatus + '</button>';
                        statusButton.onclick = function() {
                            changeStatus(userId, newStatus);
                        };
                        alert(response.data.message);
                    })
                    .catch(function(error) {
                        
                        alert('Thay đổi thành công');
                        window.location.reload();
                    });
            }
        }
    </script>
    </section>
</body>
