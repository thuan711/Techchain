@extends('layout')
@section('noidungchinh')
    <section id="spnb" class="listsp">
        <h2> SẢN PHẨM NỔI BẬT</h2>
        <div id="data">
            @foreach ($spnoibat as $sp)
             <div class="sp"> 
                    <h3>{{$sp->ten_sp}}</h3>
                    <img src="{{$sp->hinh}}">
                    <div class='gia'> {{number_format($sp->gia , 0, ",",".")}}VNĐ</div>
                    <button class='btnchon'>Chọn</button>
                    <button class="btnxem"><a href="/sp/{{$sp->id_sp}}">Xem</a></button>
             </div>
            @endforeach
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
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
                    	<img src="{{$sp->hinh}}" alt="">
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
                            <img class="product-image" src="{{$sp->hinh}}">
                            
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