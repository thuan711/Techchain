@extends('layoutad')
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Admin to</p>
						<h1>SẢN PHẨM</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="single-product pt-5 mb-150">
		<div class="container">
        <form class="mx-auto p-3" method="post" action="/admin/sanpham">
            <h1 class="text-primary p-2 h3" >THÊM SẢN PHẨM</h1>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Tên sản phẩm</label> <input value="{{old('ten_sp')}}" class="form-control" name="ten_sp" >
                </div>
                <div class="col-md-3">
                    <label>Giá SP</label> <input value="{{old('gia')}}" class="form-control" name="gia" type="number">
                </div>
                <div class="col-md-3">
                    <label>Giá KM</label> <input value="{{old('gia_km')}}" class="form-control" name="gia_km" type="number">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Ngày</label> <input value="{{old('ngay')}}" class="form-control" name="ngay" type="date">
                </div>
                <div class="col-md-6">
                    <label>Hình</label> <input value="{{old('hinh')}}" class="form-control" name="hinh" type="text">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Loại</label> 
                    <select class="form-control" name="id_loai">
                        <?php $loaisp = \App\Models\Loaisp::all();?>
                        @foreach ($loaisp as $loai )
                        @if(old('id_loai')==$loai->id_sp)
                        <option value="{{$loai->id}}" selected> {{$loai->ten_loai}}</option>
                        @else
                        <option value="{{$loai->id}}"> {{$loai->ten_loai}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Hot</label> 
                    <div class="form-control">
                        @if(old('hot')==1)
                        <input name="hot" type="radio" value="1" checked> Hot
                        <input name="hot" type="radio" value="0" > Không hot
                        @else
                        <input name="hot" type="radio" value="1" > Hot
                        <input name="hot" type="radio" value="0" checked> Không hot
                        @endif
                    </div>
                </div>
            </div>
            
            <textarea id="mota" name="mota" rows="5" class="form-control">{{old('mota')}}</textarea>
            <div class="mb-3">
                <br><button type="submit" class="btn btn-warning py-2 px-5" >Lưu</button>
            </div>  @csrf
            @if ($errors->any())
                <div class="alert alert-info p-2">
                <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach  </ul>
                </div>
            @endif
        </form> 
        </div>
    </div>
    
@endsection