
@extends('layout')
@section('noidungchinh')
<div id="chitietsp">
    <div>
        <img src="{{$sp->hinh}}" alt="Hình sản phẩm">
    </div>
    <div>
        <h1>{{$sp->ten_sp}}</h1>
        <div><span>Giá chính</span>: <del>{{number_format($sp->gia),0,',','.'}}</del>VNĐ</div>
        <div><span>Giá khuyến mãi</span>:{{number_format($sp->gia_km),0,',','.'}}VNĐ</div>
        <div><span>Ngày cập nhập</span>: {{date('d/m/Y',strtotime($sp->ngay))}}</div>
        <div><span>Số lượng</span>: <input type="number" min="1" max="50" value="1"></div>
    
    <!-- themvaogio({{$sp->id_sp}}) -->
        <span></span>
        <button class="btn btn-primary" onclick="themvaogio()">Thêm vào giỏ hàng</button>
        <button class="btn btn-success" onclick="history.back()">Trở lại</button>
    </div>
</div>
    <div id="splienquan">
        <h4>Sản phẩm liên quan</h4>
        <div id="data">
            @foreach($splienquan as $sp)
            <div class="sp">
                <h3>{{$sp->ten_sp}}</h3>
                <img src="{{$sp->hinh}}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Xem thêm thông tin</p>
						<h1>Sản phẩm</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
                    <img src="{{$sp->hinh}}" alt="Hình sản phẩm">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$sp->ten_sp}}</h3>
						<p class="single-product-pricing"><span>Giá: <del>{{number_format($sp->gia),0,',','.'}}</del></span>{{number_format($sp->gia_km),0,',','.'}} đ</p>
						<div><span>Ngày cập nhập</span>: {{date('d/m/Y',strtotime($sp->ngay))}}</div>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
							<p><strong>Danh mục: </strong>Laptop</p>
						</div>
						<h4>Chia sẻ:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Sản phẩm</span> liên quan</h3>
						<p>Các sản phẩm có cùng loại có cấu hình, giá tiền giống với sản phẩm trên.</p>
					</div>
				</div>
			</div>
			<div class="row" id="splienquan">
                <div id="data">
                    @foreach($splienquan as $sp)
                    <div class="sp">
                        <h3>{{$sp->ten_sp}}</h3>
                        <img src="{{$sp->hinh}}" alt="">
                    </div>
                    @endforeach
                </div>
				
			</div>
            
		</div>
	</div>
	<!-- end more products -->

@endsection