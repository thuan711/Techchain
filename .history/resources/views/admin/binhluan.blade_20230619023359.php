<!-- views/loaisp.blade.php -->
@extends('layoutad')
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="bl">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Admin to</p>
						<h1>DANH MỤC</h1>
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
                <th>ID</th> <th>ID & Tên sản phẩm</th> <th>Nội dung</th> <th>Thời điểm bình luận</th><th class="text-end">Hành động</th>
                </tr>
                @foreach ($bl as $bl)
                <tr><td class="align-middle"> {{$bl->id_bl}} </td>
                    <td class="align-middle"> {{$bl->id_sp}} </td>
                    <td class="align-middle"> {{$bl->noidung}} </td>
                    <td class="align-middle"> {{$bl->thoidiem}} </td>
                    <td class="align-middle text-end">               
                        <form action="/admin/loaisp/{{$bl->id_loai}}" method="post">
                            <a href="/admin/loaisp/{{$bl->id_loai}}/edit" class="btn btn-primary">Chỉnh</a>            
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