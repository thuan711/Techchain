
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
						<p>See more Details</p>
						<h1>Single Product</h1>
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
						<p class="single-product-pricing"><span>Giá:</span>{{number_format($sp->gia),0,',','.'}} đ</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum.</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categories: </strong>Fruits, Organic</p>
						</div>
						<h4>Share:</h4>
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
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

@endsection