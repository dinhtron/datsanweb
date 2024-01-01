<!-- resources/views/select_field.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
                background: linear-gradient(to bottom, #FAFAD2, white);
                padding: 10px;
                text-align: center;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }


            nav a {
                color: #00AA00;
                text-decoration: none;
                margin: 0 10px;
            }
            nav img {
                margin-left: 150px;
                width: 50px;
                height: 50px;
            }
        .nav-container {
            
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; /* Đảm bảo thanh điều hướng chiếm toàn bộ chiều rộng */
        }

        nav a.logout {
            margin-right: 10px;
            margin-left: 10; /* Khoảng cách giữa Đăng Xuất và Profile Dropdown */
        }

        .profile-dropdown {
            margin-left: auto; /* Đẩy sang bên phải */
            margin-right: 150px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
            padding: 10px;
        }

        .profile-dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-item:hover {
            background-color: #ddd;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pricing-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .price-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .price-table th,
        .price-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .price-table th {
            background-color: #333;
            color: white;
        }

        .price-table tr:hover {
            background-color: #f5f5f5;
        }

        .intro-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-info {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            text-align: center;
        }
       /* Add some styling to the form container */
/* Style the form container */
#fieldForm {
    width: 100%; /* Adjust the width as needed */
    margin: 20px auto; /* Center the form on the page */
    margin-left: 20px;
    margin-right: 20px;
}

/* Style the label */
label {
    display: block; /* Make the label a block element to place it on a new line */
    margin-bottom: 5px; /* Add some space below the label */
}

/* Style the field options container */
.field-options {
    display: flex; 
}

/* Style each field option */
.field-option {
    cursor: pointer; /* Add a pointer cursor on hover to indicate it's clickable */
    padding: 70px; /* Add padding for better visual appeal */
    margin-left: 20px; /* Add space between field options */
    border: 1px solid #ddd; /* Add a subtle border for separation */
    border-radius: 4px; /* Add some border-radius for rounded corners */
    background-color: #FAFAD2;
}

.field-option:hover {
    background-color: #f5f5f5; /* Light background color on hover */
}

/* Hide the default dropdown arrow */
select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    text-indent: 1px;
    text-overflow: '';
}

/* Style the hidden input */
#selectedField {
    display: none; /* Hide the hidden input */
}
h2 {
    text-align: center; /* Center the text horizontally */
    margin-top: 0; /* Remove default margin from the top */
}


    </style>
</head>

<body>
<!-- header.php -->
<nav class="nav-container">
    <img src="https://makan.vn/wp-content/uploads/2022/11/logo-da-banh-vector-1.jpg" alt="Logo">
    <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Trang chủ</a>
    <a href="{{ isset($id_user) ? url('/select-field') : 'javascript:showError()' }}"><i class="fas fa-futbol"></i> Đặt Sân</a>
    <a href="{{ isset($id_user) ? url('/sanpham') : 'javascript:showError()' }}"><i class="fas fa-shopping-bag"></i> Sản phẩm</a>
    <a href="{{ isset($id_user) ? url('/feedback') : 'javascript:showError()' }}"><i class="fas fa-check"></i> Phản hồi</a>

    <script>
        function showError() {
            alert("Lỗi: Không có ID được cung cấp.");
        }
    </script>
    <!-- Profile Dropdown -->
    <?php
    if (isset($id_user)) {
    ?>
        <div class="profile-dropdown">
            <a href="#" class="logout"><i class="fas fa-user"></i> Tài Khoản</a>
            <div class="dropdown-content">
                <a href="{{ url('/update-account') }}" class="logout"><i class="fas fa-exclamation-triangle"></i> Thông Tin</a>
                <a href="{{ url('/bookings') }}" class="logout"><i class="fas fa-history"></i> Lịch Sử</a>
            </div>
            <a href="{{ route('logout') }}" class="logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
        </div>
    <?php
    }else{
    ?>
        <div class="profile-dropdown">
            <a href="/login" class="logout"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a>
        </div>
    <?php
    }
    ?>

</nav>
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

</body>

</html>

