<!-- Hiển thị thông tin đơn hàng chính -->
<h3>Đơn hàng số: {{ $donhang->id_dh }}</h3>
<p>Tên người nhận: {{ $donhang->tennguoinhan }}</p>
<p>Email: {{ $donhang->email }}</p>
<!-- ... Hiển thị các thông tin khác của đơn hàng chính -->

<!-- Hiển thị thông tin chi tiết đơn hàng -->
<h4>Chi tiết đơn hàng:</h4>
<table>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($chitietdonhang as $chitiet)
        <tr>
            <td>{{ $chitiet->ten_sp }}</td>
            <td>{{ $chitiet->soluong }}</td>
            <td>{{ number_format($chitiet->gia, 0, ',', '.') }}đ</td>
            <td>{{ number_format($chitiet->soluong * $chitiet->gia, 0, ',', '.') }}đ</td>
        </tr>
        @endforeach
    </tbody>
</table>