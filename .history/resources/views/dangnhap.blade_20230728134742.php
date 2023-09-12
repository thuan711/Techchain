@extends('layout')
@section('title') Đăng ký thành viên @endsection
@section('noidungchinh')
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Đăng nhập</p>
						<h1></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<form method="post" action="{{url('/dangnhap')}}" 
class = "m-auto col-6 border border-primary mt-5" p-5> @csrf
    @if(Session::exists('thongbao'))
    <h5 class="alert alert-info text-center"> {{ Session::get('thongbao') }} </h5>
    @endif
    <div class="mb-3"> <h3 class="text-center"> Thành viên đăng nhập</h3> </div>
    <div class="mb-3 px-3"> 
        <label>Email</label> 
        <input type="text" name="email" class="form-control shadow-none p-2">
    </div>  
    <div class="mb-3 px-3">
    <label>Mật khẩu</label>
        <input type="password" name="matkhau" class="form-control shadow-none p-2">
    </div>
    <div class="mb-3 px-3">
        <button type="submit" name="btn" class="btn btn-primary">Đăng nhập</button>
    </div>
</form>
@endsection