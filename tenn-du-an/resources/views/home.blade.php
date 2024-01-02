<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body>
@include('components.header')
<div class="box">
    <div class="container">
    <div class="slider">
    @foreach ($slides as $slide)
             <img src="{{ asset('storage/' . $slide->img) }}" alt="{{ $slide->name }}" >
     @endforeach
    </div>
    </div>
    <div class="container">

        <div class="intro-container">
            <h1>Welcome to our Soccer Field Booking Website</h1>
        </div>

        <div class="pricing-container">
            <h2>Soccer Field Price List</h2>
            <h2>User ID: {{ $id }}</h2>
            <table class="price-table">
                <thead>
                    <tr>
                        <th>Field Type</th>
                        <th>Price per Hour</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Grass Field</td>
                        <td>$20</td>
                    </tr>
                    <tr>
                        <td>Artificial Turf</td>
                        <td>$25</td>
                    </tr>
                    <tr>
                        <td>Indoor Field</td>
                        <td>$30</td>
                    </tr>
                    <!-- Add more rows for additional field types -->
                </tbody>
            </table>
        </div>

 
    </div>
    </div>
           <div class="contact-info">
            <h3>Liên hệ</h3>
            <p>Địa chỉ: 123 Đường ABC, Quận XYZ, Thành phố ABC</p>
            <p>Email: info@example.com</p>
            <p>Điện thoại: 123-456-7890</p>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const slider = document.querySelector(".slider");
                const images = document.querySelectorAll(".slider img");

                let currentIndex = 0;

                function showImage(index) {
                    images.forEach((img, i) => {
                        img.style.display = i === index ? "block" : "none";
                    });
                }

                function nextImage() {
                    currentIndex = (currentIndex + 1) % images.length;
                    showImage(currentIndex);
                }

                // Set an interval to switch images every 3 seconds (adjust as needed)
                setInterval(nextImage, 5000);

                // Show the initial image
                showImage(currentIndex);
            });
                    
        </script>
</body>

</html>