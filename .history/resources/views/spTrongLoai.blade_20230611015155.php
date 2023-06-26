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
<div id='sptrongloai' class="listsp">
    <h1 class="text-center">Sản phẩm trong thuộc danh mục {{ $title }} </h1>
    <div id="data">
        @foreach ($listsp as $sp )
            <div class="sp"> 
                <h3>{{$sp->ten_sp}}</h3>
                <img src="{{$sp->hinh}}">
                <div class='gia'>{{ number_format( $sp->gia , 0 , "," , ".") }} VNĐ </div>
                <button class='btnchon'>Chọn</button>
                <button class="btnxem">
                    <a href="/sp/{{$sp->id_sp}}">
                    Xem
                    </a>
                </button>
            </div>
        @endforeach
    </div>
    <div class='p-2'> {{ $listsp->onEachSide(5)->links()}}</div>
</div>
@endsection