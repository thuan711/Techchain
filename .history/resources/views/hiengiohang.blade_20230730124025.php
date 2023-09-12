@extends('layout')
@section('title') Giỏ hàng của bạn @endsection
@section('noidungchinh')

@if(count($cart)<=0)
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
{{-- <table class="table table-bordered m-auto" id="tblgiohang">
    <h2 align="top" class="text-center">SẢN PHẨM BẠN ĐÃ CHỌN </h2>
    <tr>
        <thead class="text-center">
            <th>Tên sản phẩm</th> <th>Số lượng </th>
            <th>Đơn giá</th> <th>Thành tiền</th> <th>Xóa</th>
        </thead>
    </tr>
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
        echo "<tr>
            <td><b>{$ten_sp}</b> </td>
            <td><input type='number' value='{$soluong}' class='form-control'></td>
            <td> {$gia} </td>
            <td> {$thanhtien}</td>
            <td> 
                <a href='/xoasptronggio/{$id_sp}'>Xóa</a> 
        </td>
        </tr>"; 
    }
    @endphp
    <tr>
         <th colspan="5" class='text-center'>
            Số sản phẩm {{$tongsoluong}} . 
            Tổng tiền {{number_format($tongtien, 0,',','.')}} VNĐ
        </th>
    </tr>
</table> --}}
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
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
                                echo "<tr>
                                    <td><a href='/xoasptronggio/{$id_sp}'><i class="far fa-window-close"></i></a></td>
                                    <td> {$hinh} </td>
                                    <td><b>{$ten_sp}</b> </td>
                                    <td><input type='number' value='{$soluong}' class='form-control'></td>
                                    <td> {$gia} </td>
                                    <td> {$thanhtien}</td>
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
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>$500</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td>$45</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>$545</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="cart.html" class="boxed-btn">Update Cart</a>
                        <a href="checkout.html" class="boxed-btn black">Check Out</a>
                    </div>
                </div>

                <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection