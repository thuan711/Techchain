<!-- views/admin/loaisp_them.php -->
@extends('admin.layoutad')
@section('title') Thêm loại sản phẩm @endsection
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
            <form class="mx-auto p-3" method="post" action="/admin/loaisp">
                <h1 class="text-primary p-2 h3" >THÊM LOẠI PHÍ VẬN CHUYỂN</h1>
                
            
                <div class='mb-3 px-2'> 
                    <label> Chọn thành phố</label> 
                    <select name="city" id="city" class="form-controler choose city">
                        <option value="">--Chọn tỉnh thành phố--</option>
                        @foreach($city as $key => $ci)
                            <option value="{{$ci->matp}}">{{$ci->name_tp}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='mb-3 px-2'> 
                    <label> Chọn quận huyện</label> 
                    <select name="province" id="province" class="form-controler input-sm province choose">
                        <option value="">--Chọn quận huyện--</option>
                    </select>
                </div>
                <div class='mb-3 px-2'> 
                    <label> Chọn xã phường</label> 
                    <select name="wards" id="wards" class="form-controler wards choose">
                        <option value="">--Chọn xã phường--</option>
                    </select>   
                </div>
                <div class="mb-3">
                    <label>Phí vận chuyển</label> 
                    <input class="form-control" name="fee_ship">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-warning py-2 px-5" >Lưu</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
       
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var result = '';
            // alert(action);
            // alert(ma_id);
            // alert(_token);
            if(action == 'city'){
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data: {action:action, ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })
</script>