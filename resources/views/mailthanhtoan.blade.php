<!DOCTYPE html>
<html>
<head>
    <title>Cảm ơn quý khách đã mua hàng</title>
</head>
<body>
    <h1>Hóa đơn điện tử</h1>
    <p>Xin chào {{ $orderInfo['ten_nguoi_nhan'] }},</p>
    <p>Chúng tôi xin chân thành cảm ơn quý khách đã tin tưởng và mua hàng tại cửa hàng của chúng tôi.</p>
    <p>Thông tin đơn hàng của quý khách:</p>
    <ul>
        <li>Tổng tiền: {{ number_format($orderInfo['tong_tien'], 0, ',', '.') }}đ</li>
        <li>Tên người nhận: {{ $orderInfo['ten_nguoi_nhan'] }}</li>
        <li>Địa chỉ giao hàng: {{ $orderInfo['dia_chi_giao_hang'] }}</li>
        <li>Điện thoại: {{ $orderInfo['dien_thoai'] }}</li>
        <!-- Các thông tin đơn hàng khác nếu cần -->
    </ul>
    <p>Xin cảm ơn quý khách một lần nữa và hy vọng được phục vụ quý khách trong tương lai.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ cửa hàng</p>
</body>
</html>