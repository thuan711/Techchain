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
        <div id="data">
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
        <h2>ĐỐI TÁC CỦA CHÚNG TÔI</h2>
        <div id="data">
            <div><img src="/images/acer.jpg"></div>
            <div><img src="/images/asus.png"></div>
            <div><img src="/images/apple.jpg"></div>
            <div><img src="/images/CHUWI.png"></div>
            <div><img src="/images/dell.png"></div>
            <div><img src="/images/hp.jpg"></div>
            <div><img src="/images/itel.jpg"></div>
            <div><img src="/images/lenovo.png"></div>
            <div> <img src="/images/lg.png"></div>             
            <div> <img src="/images/msi.png"></div>
            <div><img src="/images/Masstel.jpg"></div>
            <div><img src="/images/Surface.jpg"></div>
        </div>
    </section>
    <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
                        <img src="/images/acer.jpg">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection