@extends('layout')
@section('title')
	Thanh toán
@endsection
@section('noidungchinh')
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p></p>
						<h1>Thanh toán</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Địa chỉ nhận hàng
						        </button>
						      </h5>
						    </div>
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
								
								}
							@endphp   
						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="/admin/donhang"  method="post">
						        		<p><input type="text" placeholder="Tên" name="tennguoinhan"></p>
						        		<p><input type="email" placeholder="Email" name="email"></p>
						        		<p><input type="text" placeholder="Địa chỉ" name="diachigiaohang"></p>
						        		<p><input type="tel" placeholder="Điện thoại" name="dienthoai"></p>
										<label for="">Hình thức thanh toán</label>
											<div>
												<input type="radio" id="thanh-toan-nhan-hang" name="hinh-thuc-thanh-toan" value="thanh-toan-nhan-hang">
												<label for="thanh-toan-nhan-hang">Thanh toán khi nhận hàng</label>
											</div>
											<div>
												<input type="radio" id="momo" name="hinh-thuc-thanh-toan" value="momo">
												<label for="momo">Momo</label>
											</div>
											<p><input style="display:none" name="tongtien" readonly value="{{$tongtien}}"></p>
											<div class="mb-3">
												<button type="submit" class="btn btn-warning py-2 px-5" >Đặt hàng</button>
											</div>  @csrf 
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Chi tiết đơn hàng
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Sản phẩm bạn chọn</th>
									<th>Giá</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
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
                                    <td class='product-name'><b>{$ten_sp} x {$soluong}</b> </td>
                                    <td> {$thanhtien}<sup>&#273;</sup></td>
                                    
                                </tr>"; 
                            }
                            @endphp    
								
							<tbody class="checkout-details">
								<tr>
									<td>Phí giao hàng</td>
									<td>0<sup>&#273;</sup></td>
								</tr>
								<tr>
									<td>Tổng</td>
									<td name="tongtien">{{number_format($tongtien, 0,',','.')}}<sup>&#273;</sup></td>
								</tr>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection