<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="/css/style.css" rel="stylesheet">
    
</head>
<body>
<div id="container">
    <header>
        <img src="images/logo.png" id="logo">
        <div id="giohang">Giỏ hàng có 1 sản phẩm</div>
    </header>
    <nav>
        <ul>
            <li> <a href="#"> Trang chủ </a></li>
            <li> <a href="#"> Sản phẩm </a></li>
            <li> <a href="#"> Tin tức </a></li>
            <li> <a href="#"> Giới thiệu </a></li>
            <li> <a href="#"> Liên hệ </a></li>
        </ul>
    </nav>
    <main>
        @yield('noidungchinh')
        
    </main>
    <footer>
        Dự án Tech chain ! Phát triển bởi sinh viên Nguyễn Văn Long
    </footer>
</div> 
</body>
</html>