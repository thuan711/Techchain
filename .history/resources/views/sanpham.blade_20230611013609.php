@extends('layout')
@section('noidungchinh')
<!-- breadcrumb-section -->
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
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			

			<div class="row product-lists">
				@foreach ($listsp as $sp)
				<div class="col-lg-3 col-md-4 text-center strawberry">
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
	</div>
	<!-- end products -->
	<div class="row">
            <article class="col-sm-9" ng-controller="tnctrl">
                <div ng-view></div>
            </article>
            <aside class="col-sm-3">
                <div class="card mt-1 ml-n2 mr-n2">
                    <div class="card-header font-weight-bold"><i class="fas fa-list"></i> DANH MỤC</div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            <li class="list-group-item" ng-repeat="mh in cacmonhoc|orderBy:'Name'">
                                <a href="#!tracnghiem/{{mh.Id}}/{{mh.Name}}" style="text-decoration: none;">
                                    {{mh.Name|uppercase}}
                                </a>
                            </li>
                        </ul>
                    </div>
					@foreach ($loai as $lo)
                    <div class="product-filters">
                        <ul>
                            <li class="active">{{$lo->ten_loai}}</li>
                            
                        </ul>
                    </div>
					@endforeach
                </div>
            </aside>
        </div>
@endsection
