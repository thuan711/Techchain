
@extends('layout')
@section('noidungchinh')

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
	<div class="single-product mt-150 mb-5">
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
	@foreach($ct as $ct)
	
	<div class="single-product mb-5">
		<div class="container">
			<div class="row">
				<article class="col-sm-8">
					<h2 class="">Đặc điểm nổi bật</h2>
					<div id="content" class="short-content" style="height:300px; overflow: hidden;">
						{!! $ct->mota !!}
					</div>
					<button class="btn btn-primary"  id="btnToggle" onclick="toggleContent()">Xem thêm</button>
				</article>
				<aside class="col-sm-4">
					<h2>Thông số kỹ thuật Laptop {{$sp->ten_sp}}</h2>
						<table class="table table-hover" style="">
						<tbody>
							<tr>
								<th scope="row">RAM:</th>
								<td>{{$ct->RAM}}</td>
							</tr>
							<tr>
								<th scope="row">CPU:</th>
								<td>{{$ct->CPU}}</td>
							</tr>
							<tr>
								<th scope="row">Bộ nhớ:</th>
								<td>SSD {{$ct->Dia}}</td>
							</tr>
							<tr>
								<th scope="row">Màu sắc:</th>
								<td>{{$ct->Mausac}}</td>
							</tr>
							<tr>
								<th scope="row">Cân nặng:</th>
								<td>{{$ct->Cannang}} Kg</td>
							</tr>
							
						</tbody>
						</table>
					</div>
				</div>
			</aside>
	</div>
	<div class="single-product mb-5">
		<div class="container">
			<h4>Đánh giá và nhận xét về {{$sp->ten_sp}}</h4>
			<i class="fa fa-star"></i>
			<form action="/submit_comment" method="POST">
				<label for="name">Họ và tên:</label>
				<input type="text" id="name" name="name" required>

				<label for="email">Địa chỉ email:</label>
				<input type="email" id="email" name="email" required>

				<label for="comment">Nội dung bình luận:</label>
				<textarea id="comment" name="comment" rows="4" required></textarea>

				<button type="submit">Gửi bình luận</button>
			</form>
		</div>
	</div>
	
	
</div>
	@endforeach
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
			
			
            <div class="row">
            @foreach($splienquan as $sp)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/sp/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt=""></a>
						</div>
						<h3>{{$sp->ten_sp}}</h3>
						<p class="product-price"><span>Giá</span> {{number_format($sp->gia_km),0,',','.'}} đ</p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
                @endforeach
			</div>
            
		</div>
	</div>
	<!-- end more products -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function toggleContent() {
        var content = $('#content');
        var button = $('#btnToggle');

        if (content.hasClass('short-content')) {
            content.removeClass('short-content');
            content.css('height', 'auto');
            button.text('Ẩn bớt');
        } else {
            content.addClass('short-content');
            content.css('height', '300px');
            button.text('Xem thêm');
        }
    }
</script>
@endsection