@extends('admin.layoutad')
@section('title') Đơn hàng @endsection
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Admin to</p>
						<h1>ĐƠN HÀNG</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="single-product pt-5 mb-150">
		<div class="container">
            <table class='table table-hover table-strip table-bordered'>
                <tr class="bg-secondary">
                <th>ID Đơn hàng</th> <th>User</th> <th>Thời điểm mua</th> <th>Tên người nhận</th><th>Số điện thoại & Địa chỉ</th><th>Trạng thái</th><th>Tổng tiền</th><th class="text-end">Hành động</th>
                </tr>
                @foreach ($dh as $dh)
                <tr><td class="align-middle"> {{$dh->id_dh}} </td>
                    <td class="align-middle text-center">
                    {{ app()->call('App\Http\Controllers\UserController@name', ['id_user' => $dh->id_user]) }}
                    </td>
                    <td class="align-middle"> {{$dh->thoidiemmua}} </td>
                    <td class="align-middle"> {{$dh->tennguoinhan}} </td>
                    <td class="align-middle"> SĐT:<b> {{$dh->dienthoai}} </b> <br> Địa chỉ: {{$dh->diachigiaohang}} </td>
                    <td class="align-middle bg-success"> @if($dh->trangthai==0)
                        Đang xử lí
                        @elseif($dh->trangthai==1)
                        Vận chuyển
                        @elseif($dh->trangthai==2)
                        Giao hàng
                        @elseif($dh->trangthai==3)
                        Thành công
                        @endif  
                    </td>
                    <td class="align-middle"> {{number_format($dh->tongtien,0,",",".")}} đ</td>
                    <td class="align-middle text-end">               
                        <form action="/admin/donhang/{{$dh->id_loai}}" method="post">
                            <a href="/admin/loaisp/{{$dh->id_loai}}/edit" class="btn btn-primary">Chi tiết</a>            
                            <button onclick="return confirm('Bạn muốn xóa danh mục?')" class="btn btn-danger" type="submit">Xóa</button>
                            @csrf  @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr> <td colspan="7"> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    
                                </ul>
                            </div>
                        </div>
                    </div> </td> </tr>
            </table>
        </div>
    </div>
@endsection