<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
</head>
<body>
<div id="container">
    <header>
        <img src="images/logo.png" id="logo">
        <div id="giohang">Giỏ hàng có 1 sản phẩm</div>
    </header>
    <nav>
        <ul>
            <li> <a href="/"> Trang chủ </a></li>
            <li> <a href="#"> Sản phẩm </a></li>
            <li> <a href="#"> Tin tức </a></li>
            <li> <a href="#"> Giới thiệu </a></li>
            <li> <a href="/lienhe"> Liên hệ </a></li>
        </ul>
    </nav>
    <main>
        @yield('noidungchinh')
        
    </main>
    <footer>
        Dự án Tech chain ! Phát triển bởi sinh viên Hồ Viết Thuận
    </footer>
</div> 
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>