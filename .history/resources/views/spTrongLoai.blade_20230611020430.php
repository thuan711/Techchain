@extends('layout')
@section('noidungchinh')
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-section mt-100 mb-150">
		<div class="container">
            <h1>Các sản phẩm thuộc danh mục: </h1>
			<div class="row">
				<article class="col-sm-9" ng-controller="tnctrl">
					<div>
						<div class="row product-lists">
							@foreach ($listsp as $sp)
							<div class="col-lg-4 col-md-6 text-center strawberry">
								<div class="single-product-item">
									<div class="product-image">
										<a href="/sp/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt=""></a>
									</div>
									<h3>{{$sp->ten_sp}}</h3>
									<p class="product-price">  {{number_format($sp->gia , 0, ",",".")}}<sup>đ</sup> </p>
									<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">
								<div class="pagination-wrap">
									<ul>
										<li><a href="#">Prev</a></li>
										<li>{{ $listsp->onEachSide(2)->links()}}</li>
										<li><a href="#">Next</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</article>
				<aside class="col-sm-3">
					<div class="card mt-1 ml-n2 mr-n2">
						<div class="card-header font-weight-bold"><i class="fas fa-list"></i> DANH MỤC
					</div>
						@foreach ($loai as $lo)
						<div class="card-body p-0">
							<ul class="list-group">
								<li class="list-group-item">
									<a href="/loai/{{$sp->id_loai}}">{{$lo->ten_loai}}</a>
								</li>
							</ul>
						</div>
						@endforeach
					</div>
				</aside>
			</div>
		</div>
	</div>
@endsection