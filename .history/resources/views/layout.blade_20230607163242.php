<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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