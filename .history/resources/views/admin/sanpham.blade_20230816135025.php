<!-- views/loaisp.blade.php -->
@extends('admin.layoutad')
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
        <button class="btn btn-primary m-2 p-2 float-right"><a style="color:white" href="/admin/sanpham/create">Thêm sản phẩm</a></button>
            <table class='table table-hover table-strip table-bordered'>
                <tr class="bg-secondary text-center">
                <th>ID</th> <th>Tên sản phẩm</th> <th>Giá SP / Ngày</th><th>Xem / Hot</th>
                <th>Loại</th> <th class="text-end">Hành động</th>
                </tr>
                @foreach ($listsanpham as $row)
                <tr><td class="align-middle" width="120"> 
                    <img src="{{$row->hinh}}" width="120" height="120"> 
                    </td>
                    <td class="align-middle" width="500"> 
                        <b class="text-primary">{{$row->ten_sp}}</b> <br>
                        <!-- {!!$row->mota!!} -->
                    </td>
                    <td class="align-middle text-center"> 
                        Giá: <b><del>{{number_format($row->gia,0,",",".")}}</del> </b> <br>
                        KM: <b>{{number_format($row->gia_km,0,",",".")}} </b> <br>            
                            {{ date('d/m/Y',strtotime($row->ngay))}} 
                    </td>
                    <td class="align-middle text-center"> 
                        Xem: {{$row->soluotxem}} <br> 
                        Hot: {{($row->hot==1)? "Nổi bật":"Bình thường"}}
                    </td>
                    <td class="align-middle text-center">
                    {{ app()->call('App\Http\Controllers\ProductController@ten_loai', ['id_loai' => $row->id_loai]) }}
                    </td>
                    <td class="align-middle text-end">               
                        <form action="/admin/sanpham/{{$row->id_sp}}" method="post">
                            <a href="/admin/sanpham/{{$row->id_sp}}/edit" class="btn btn-primary">Chỉnh</a>            
                            <button onclick="return confirm('Bạn muốn xóa sản phẩm?')" class="btn btn-danger" type="submit"> Xóa </button>
                            <a href="/admin/chitietsp/{{$row->id_sp}}/edit" class="btn btn-success mt-2">Chi tiết</a><br>
                            
                        </div>  
                            @csrf  @method('DELETE')
                        </form>
                    </td>
                </tr>
                
                @endforeach
                <tr> <td colspan="6"> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li>{{ $listsanpham->onEachSide(2)->links()}}</li> 
                                </ul>
                            </div>
                        </div>
                    </div> </td> </tr>
            </table>
            <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" accept=".xlsx"> <br>
                <input type="submit" name="import_csv" value="Import CSV" class="btn btn-success">
            </form>
            <form action="{{url('export-csv')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="submit" name="export_csv" value="Export CSV" class="btn btn-warning">
            </form>
        </div>
    </div>
@endsection