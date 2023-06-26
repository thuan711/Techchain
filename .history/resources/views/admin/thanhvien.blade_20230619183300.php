<!-- views/loaisp.blade.php -->
@extends('layoutad')
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="user">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Admin to</p>
						<h1>THÀNH VIÊN</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="single-product pt-5 mb-150">
		<div class="container">
           <table class='table table-hover table-strip table-bordered'>
                <tr class="bg-secondary">
                <th>ID</th> <th>Họ và tên</th> <th>Username</th><th>Email</th> <th>SĐT và địa chỉ</th> <th>Vai trò</th><th class="text-end">Hành động</th>
                </tr>
                @foreach ($user as $user)
                <tr><td class="align-middle"> {{$user->id_user}} </td>
                    <td class="align-middle"> {{$user->ho}} <br> <b>{{$user->ten}}</b> </td>
                    <td class="align-middle"> {{$user->name}} </td>
                    <td class="align-middle"> {{$user->email}} </td>
                    <td class="align-middle">SĐT: {{$user->sdt}} <br> Địa chỉ: {{$user->diachi}} </td>
                    <td class="align-middle text-end">               
                        <form action="/admin/loaisp/{{$user->id_loai}}" method="post">
                            <a href="/admin/loaisp/{{$user->id_loai}}/edit" class="btn btn-primary">Chỉnh</a>            
                            <button onclick="return confirm('Bạn muốn xóa danh mục?')" class="btn btn-danger" type="submit">Xóa</button>
                            @csrf  @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
@endsection