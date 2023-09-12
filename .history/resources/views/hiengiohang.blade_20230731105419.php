@extends('layout')
@section('title') Giỏ hàng của bạn @endsection
@section('noidungchinh')


<div class="breadcrumb-section breadcrumb-bg mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Tất cả Sản phẩm</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
@if(count($cart)<0)
<h3 class="text-danger bg-info text-center p-4 mb-2">Bạn chưa chọn sản phẩm nào</h3>
@else
<div class="breadcrumb-section breadcrumb-bg mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Tất cả Sản phẩm</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table" style="font-size: 15px">
                            <thead class="cart-table-head text-center">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Ảnh sản phẩm</th>
                                    <th class="product-name">Tên</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $tongtien=0; 
                                    $tongsoluong=0;
                                    //code để hiện các sản phẩm trong giỏ 

                                    foreach( $cart as $c) {
                                    $id_sp = $c['id_sp'];
                                    $soluong = $c['soluong'];
                                    $ten_sp = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('ten_sp');
                                    $gia = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('gia');
                                    $hinh = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('hinh');
                                
                                    $thanhtien = $gia*$soluong;
                                    $tongtien+=$thanhtien; 
                                    $tongsoluong+=$soluong; 
                                    $thanhtien = number_format($thanhtien,0,',','.') ;
                                    $gia = number_format($gia,0,',','.') ;
                                    echo "<tr class='table-body-row'>
                                        <td class='product-remove'><a href='/xoasptronggio/{$id_sp}'><i class='far fa-window-close'></i></a></td>
                                        <td> <img src='{$hinh}' width='140px'> </td>
                                        <td class='product-name'><b>{$ten_sp}</b> </td>
                                        <td> {$gia}<sup>&#273;</sup> </td>
                                        <td class='product-quantity p-2'><input type='number' value='{$soluong}' class='form-control'></td>
                                        <td> {$thanhtien}<sup>&#273;</sup></td>
                                        <td> 
                                            
                                    </td>
                                    </tr>"; 
                                }
                                @endphp                                                                                                 
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Tổng cộng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr class="total-data">
                                    <td><strong>Tổng sản phẩm: </strong></td>
                                    <td>{{$tongsoluong}}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Phí giao hàng: </strong></td>
                                    <td>0 VNĐ</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Tổng: </strong></td>
                                    <td>{{number_format($tongtien, 0,',','.')}} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="/thanhtoan" class="boxed-btn black">Thanh toán</a>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Áp dụng mã giảm giá</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Nhập mã"></p>
                                <p><input type="submit" value="Áp dụng"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection