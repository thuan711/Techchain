@extends('layoutad')
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Admin to</p>
						<h1>CẬP NHẬP SẢN PHẨM</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="single-product pt-5 mb-150">
		<div class="container">
        <form class="mx-auto p-3" method="post" action="/admin/sanpham/{{$sp->id_sp}}">
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Tên sản phẩm</label> <input value="{{$sp->ten_sp}}" class="form-control" name="ten_sp">
                </div>
                <div class="col-md-3">
                    <label>Giá SP</label> <input value="{{$sp->gia}}" class="form-control" name="gia" type="number">
                </div>
                <div class="col-md-3">
                    <label>Giá KM</label> <input value="{{$sp->gia_km}}" class="form-control" name="gia_km" type="number">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Ngày</label> <input value="{{$sp->ngay}}" class="form-control" name="ngay" type="date">
                </div>
                <div class="col-md-6">
                    <label>Hình</label> <input value="{{$sp->hinh}}" class="form-control" name="hinh" type="text">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Loại</label> 
                    <select class="form-control" name="id_loai">
                        <?php $loaisp = \App\Models\Loaisp::all();?>
                        @foreach ($loaisp as $loai )
                        @if($sp->id_loai==$loai->id_sp)
                        <option value="{{$loai->id_loai}}" selected> {{$loai->ten_loai}}</option>
                        @else
                        <option value="{{$loai->id_loai}}"> {{$loai->ten_loai}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Hot</label> 
                    <div class="form-control">
                        @if($sp->hot==1)
                        <input name="hot" type="radio" value="1" checked> Hot
                        <input name="hot" type="radio" value="0" > Không hot
                        @else
                        <input name="hot" type="radio" value="1" > Hot
                        <input name="hot" type="radio" value="0" checked> Không hot
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-warning py-2 px-5" >Lưu</button>
            </div>  @csrf {{method_field('PUT')}}
            @if ($errors->any())
                <div class="alert alert-info p-2">
                <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach  </ul>
                </div>
            @endif
        </form> 
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'mota' );
    </script>
@endsection