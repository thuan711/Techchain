@extends('layoutad')
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Admin to</p>
						<h1>Loại</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="single-product pt-5 mb-150">
		<div class="container">
			<form class="mx-auto p-3" method="post" action="/admin/loaisp/{{$loaisp->id_loai}}">
				<h1 class="text-primary p-2 h3" >CHỈNH LOẠI SẢN PHẨM</h1>
				<div class="mb-3">
					<label>Tên loại</label> 
					<input value="{{$loaisp->ten_loai}}" class="form-control" name="ten_loai" >
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-warning py-2 px-5" >Lưu</button>
				</div>  @csrf {{ method_field('PUT') }}
			</form>
		</div>
	</div> 
@endsection
