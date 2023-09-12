<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận thanh toán thành công</title>
</head>
<body>
    <h1>Xác nhận thanh toán thành công</h1>
    <p>Cảm ơn quý khách đã thanh toán đơn hàng thành công.</p>
    <p>Thông tin đơn hàng:</p>
    <ul>
        <li>Mã đơn hàng: 00000000</li>
        <li>Tổng tiền: {{ number_format($orderInfo['tong_tien'], 0, ',', '.') }}đ</li>
        <!-- Các thông tin đơn hàng khác nếu cần -->
    </ul>
    <p>Xin cảm ơn!</p>
</body>
</html>