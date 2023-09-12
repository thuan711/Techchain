
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
								<input type="number" placeholder="1">
							</form>
							<a href="/themvaogio/{{$sp->id_sp}}/1" class="cart-btn"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
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
						<table class="table table-hover">
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
		<div class="container border border-solid-black border-radius-5">
			<div class="p-2">
				<h4>Đánh giá và nhận xét về {{$sp->ten_sp}}</h4>
				<div class="row">
					<div class="col-sm-4 border-right border-solid-black ">
						<button type="button" class="btn btn-warning ml-5  mt-3 float-center w-50 h-50 mx-2 mb-2" data-toggle="modal" data-target="#exampleModal">
						<i class="fa-solid fa-pen-to-square"></i> <b>Gửi đánh giá</b> 
                        </button>
                        <div class="modal fade p-2" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
								<h5 class="modal-title p-2" id="exampleModalLabel">Bạn cảm thấy {{$sp->ten_sp}} như thế nào?</h5>

									<div class="modal-header">
										<form method="post">
											<div class="form-row">
												<div class="form-group col-md-6">
												<label for="inputEmail4">Họ và tên</label>
												<input type="text" name="name" class="form-control">
												</div>
												<div class="form-group col-md-6">
												<label for="inputPassword4">Số điện thoại</label>
												<input type="text"  name="sdt" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label for="inputAddress">Đánh giá của bạn</label>
												<input type="text" class="form-control" name="noidung">
											</div>
											<button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> <b>Gửi đánh giá</b> </button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="detail-1 pl-2 rating-bar">
							<div class="star">
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
							</div>
							<div class="progress-bar"></div>
							<p class="d-inline ml-3">0 đánh giá</p>
						</div> 
						<div class="detail-1 pl-2 rating-bar">
							<div class="star">
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
							</div>
							<div class="progress-bar"></div>
							<p class="d-inline ml-3">0 đánh giá</p>
						</div> 
						<div class="detail-1 pl-2 rating-bar">
							<div class="star">
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
							</div>
							<div class="progress-bar "></div>
							<p class="d-inline ml-3">0 đánh giá</p>
						</div> 
						<div class="detail-1 pl-2 mx-0 rating-bar">
							<div class="star">
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
							</div>
							<div class="progress-bar color-orange"></div>
							<p class="d-inline ml-3">0 đánh giá</p>
						</div> 
						<div class="detail-1 pl-2 mx-0 rating-bar">
							<div class="star">
								<i class="fa fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
								<i class="fa-regular fa-star" style="color: orange"></i>
							</div>
							<div class="progress-bar bg-orange"></div>
							<p class="d-inline ml-3">0 đánh giá</p>
						</div> <br>
					</div>
				</div>
				@foreach($bl as $bl)
				<div class="row">
					<div class="col-sm-1">
						<div class="avatar"><img src="/images/dell.png" alt=""></div>
					</div>
					<div class="col-sm-11">
						<h5 class="color:orange">{{$bl->name}}</h5>
						<i class="fa-regular fa-clock"></i> {{ date('d-m-Y', strtotime($bl->thoidiem)) }}
					</div>
				</div>
				
				<p class="p-1">{{$bl->noidung}}</p>
				@endforeach
			</div>
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
						<p class="product-price"> {{number_format($sp->gia_km),0,',','.'}} đ</p>
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