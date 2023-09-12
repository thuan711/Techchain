@extends('layout')
@section('title') Đăng ký thành viên @endsection
@section('noidungchinh')
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cảm ơn</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="alert alert-info text-center">
        @if(Session::exists('thongbao'))
            <h4>{{ Session::get('thongbao') }}</h4> <hr>
        @endif
        <a href="/">Về trang chủ</a>
    </div>
@endsection 