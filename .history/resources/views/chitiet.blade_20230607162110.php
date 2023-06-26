
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
    </div>
    <div>
    <!-- themvaogio({{$sp->id_sp}}) -->
        <span></span>
        <button class="btn- btn-primary" onclick="themvaogio()">Thêm vào giỏ hàng</button>
        <button class="btn btn-success" onclick="history.back()">Trở lại</button>
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

@endsection