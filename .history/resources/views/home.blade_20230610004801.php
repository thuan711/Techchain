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
    <section id="spgs" class="listsp">
        <h2> SẢN PHẨM GIẢM SỐC</h2>
        <div id="data" class="col-lg-4 col-md-6 text-center">
            @foreach ($spxemnhieu as $sp)
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