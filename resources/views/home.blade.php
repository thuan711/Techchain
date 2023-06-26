@extends('layout')
@section('noidungchinh')
    <div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh & Organic</p>
							<h1>Delicious Seasonal Fruits</h1>
							<div class="hero-btns">
								<a href="shop.html" class="boxed-btn">Fruit Collection</a>
								<a href="contact.html" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>Miễn phí vận chuyển</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Tổng đài hỗ trợ 24/7</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Hoàn trả hàng trong 3 ngày</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<section id="spgs" class="product-section mt-150 mb-150">
        <div class="col-lg-8 offset-lg-2 text-center mt-4">
            <div class="section-title">	
                <h3><span class="orange-text">Sản phẩm</span> Nổi bật</h3>
            </div>
        </div>
        <div id="data" class="text-center container">
            <div class="row">
                @foreach ($spnoibat as $sp)
                <div class="col-md-3 ">
                    <div class="single-product-item"> 
                    <a href="/sp/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt=""></a>
                            
                            <h3>{{$sp->ten_sp}}</h3>
                            <p class='product-price'> {{number_format($sp->gia , 0, ",",".")}}<sup>đ</sup></p>
                            <a href="/sp/{{$sp->id_sp}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>       
                @endforeach
            </div>
        </div>
    </section>
    <section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            @foreach ($sphot as $sp)
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> 
                                </span>
                            </div>
                        </div>
                    	<a href="/sp/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt=""></a>
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h5><span class="orange-text">Giảm sốc</span> trong tháng</h5>
                    <h1>{{$sp->ten_sp}}</h1>
                    <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                	<a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>    
            @endforeach
            </div>
        </div>
    </section>
<!---->
    <section id="spgs" class="product-section mt-150 mb-150">
        <div class="col-lg-8 offset-lg-2 text-center mt-4">
            <div class="section-title">	
                <h3><span class="orange-text">Sản phẩm</span> Giảm sốc</h3>
            </div>
        </div>
        <div id="data" class="text-center container">
            <div class="row">
                @foreach ($spxemnhieu as $sp)
                <div class="col-md-3 ">
                    <div class="single-product-item"> 
                    <a href="/sp/{{$sp->id_sp}}"><img src="{{$sp->hinh}}" alt=""></a>
                            
                            <h3>{{$sp->ten_sp}}</h3>
                            <p class='product-price'> {{number_format($sp->gia , 0, ",",".")}}<sup>đ</sup></p>
                            <a href="/sp/{{$sp->id_sp}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>       
                @endforeach
            </div>
        </div>
    </section>
    <section id="doitac" >
        <div class="row">
				<div class="col-lg-8 offset-lg-2 text-center mt-4">
					<div class="section-title">	
						<h3><span class="orange-text">Đối tác</span> Chúng tôi</h3>
					</div>
				</div>
			</div>
        
    
    <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
                            <img src="/images/acer.jpg">
						</div>
						    <div class="single-logo-item">
                        <img src="/images/asus.png">
						</div>
						<div class="single-logo-item">
                            <img src="/images/apple.jpg">
						</div>
						<div class="single-logo-item">
                            <img src="/images/CHUWI.png">
						</div>
						<div class="single-logo-item">
                            <img src="/images/dell.png">
						</div>
                        <div class="single-logo-item">
                            <img src="/images/hp.jpg">
						</div>
                        <div class="single-logo-item">
                            <img src="/images/itel.jpg">
						</div>
                        <div class="single-logo-item">
                            <img src="/images/lenovo.png">
						</div>
                        <div class="single-logo-item">
                            <img src="/images/lg.png">
						</div>
                        <div class="single-logo-item">
                            <img src="/images/msi.png">
						</div>
                        <div class="single-logo-item">
                            <img src="/images/Surface.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </section>
@endsection