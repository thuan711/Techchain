@extends('layoutad')
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
            <button class="btn btn-primary m-2 p-2 float-right"><a style="color:white" href="/admin/loaisp/create">Thêm danh mục</a></button>
            <table class='table table-hover table-strip table-bordered'>
                <tr class="bg-secondary">
                <th>ID Đơn hàng</th> <th>Tên loại</th> <th>Thứ tự</th><th class="text-end">Hành động</th>
                </tr>
                @foreach ($dh as $dh)
                <tr><td class="align-middle"> {{$dh->id_dh}} </td>
                    <td class="align-middle"> {{$dh->thoidiemmua}} </td>
                    <td class="align-middle"> {{$dh->tennguoinhan}} </td>
                    <td class="align-middle text-end">               
                        <form action="/admin/loaisp/{{$dh->id_loai}}" method="post">
                            <a href="/admin/loaisp/{{$dh->id_loai}}/edit" class="btn btn-primary">Chỉnh</a>            
                            <button onclick="return confirm('Bạn muốn xóa danh mục?')" class="btn btn-danger" type="submit">Xóa</button>
                            @csrf  @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr> <td colspan="4"> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li>{{ $donhang->onEachSide(2)->links()}}</li> 
                                </ul>
                            </div>
                        </div>
                    </div> </td> </tr>
            </table>
        </div>
    </div>
@endsection