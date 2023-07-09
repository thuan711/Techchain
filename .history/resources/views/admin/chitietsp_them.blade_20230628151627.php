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
        <form class="mx-auto p-3" method="post" action="/admin/chitietsp/{{$ct->id_ct}}">
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Tên sản phẩm</label> 
                    <input class="p-2" value="{{ app()->call('App\Http\Controllers\ChitietspController@ten_sp', ['id_sp' => $ct->id_sp]) }}" name="id_sp" disabled> </input>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>RAM</label> <input value="{{$ct->RAM}}" class="form-control" name="RAM">
                </div>
                <div class="col-md-3">
                    <label>CPU</label> <input value="{{$ct->CPU}}" class="form-control" name="CPU">
                </div>
                <div class="col-md-3">
                    <label>Đĩa</label> <input value="{{$ct->Dia}}" class="form-control" name="Dia">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label>Màu sắc</label> <input value="{{$ct->Mausac}}" class="form-control" name="Mausac">
                </div>
                <div class="col-md-6">
                    <label>Cân nặng (kg)</label> <input value="{{$ct->Cannang}}" class="form-control" name="Cannang">
                </div>
            </div>
            
            <div class=" row pt-3 pl-3">
                <label>Mô tả</label> 
            </div>
            <div class="mb-3 row pl-3">
                <textarea name="mota" id="mota" rows="5" class="form-control">{{$ct->mota}}</textarea> 
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