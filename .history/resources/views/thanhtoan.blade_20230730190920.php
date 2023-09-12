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
						        		<p><label for="">Họ tên (*)</label><input type="text" name="tennguoinhan" value="{{old('tennguoinhan')}}"></p>
						        		<p><label for="">Email (*)</label><input type="email" name="email" value="{{old('email')}}"></p>
						        		<p><label for="">Địa chỉ nhận hàng (*)</label><input type="text" name="diachigiaohang" value="{{old('diachinhanhang')}}"></p>
						        		<p><label for="">Số điện thoai (*)</label><input type="tel" name="dienthoai" value="{{old('dienthoai')}}" ></p>
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
											@if ($errors->any())
												<div class="alert alert-danger">
													<ul>
														@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif
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
						        <table class="cart-table" style="font-size: 15px">
									<thead class="cart-table-head text-center">
										<tr class="table-head-row">
											<th class="product-remove"></th>
											<th class="product-image">Ảnh sản phẩm</th>
											<th class="product-name">Tên</th>
											<th class="product-name">Giá</th>
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
												<td class='product-quantity p-2'><input value='{$soluong}' class='form-control text-center' disabled></td>
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