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
                        <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <select name="calc_shipping_provinces" required="">
        <option value="">Tỉnh / Thành phố</option>
      </select>
      <select name="calc_shipping_district" required="">
        <option value="">Quận / Huyện</option>
      </select>
      <input class="billing_address_1" name="" type="hidden" value="">
      <input class="billing_address_2" name="" type="hidden" value="">
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change', function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('meta[name="csrf-token"]').attr('content'); // Lấy CSRF token từ thẻ meta
            var result = (action === 'city') ? 'province' : 'wards';

            $.ajax({
                url: '{{ url('/select-delivery') }}',
                method: 'POST',
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token // Bao gồm CSRF token trong yêu cầu
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            });
        });
    });
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'/>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'/>
<script>//<![CDATA[
if (address_2 = localStorage.getItem('address_2_saved')) {
  $('select[name="calc_shipping_district"] option').each(function() {
    if ($(this).text() == address_2) {
      $(this).attr('selected', '')
    }
  })
  $('input.billing_address_2').attr('value', address_2)
}
if (district = localStorage.getItem('district')) {
  $('select[name="calc_shipping_district"]').html(district)
  $('select[name="calc_shipping_district"]').on('change', function() {
    var target = $(this).children('option:selected')
    target.attr('selected', '')
    $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
    address_2 = target.text()
    $('input.billing_address_2').attr('value', address_2)
    district = $('select[name="calc_shipping_district"]').html()
    localStorage.setItem('district', district)
    localStorage.setItem('address_2_saved', address_2)
  })
}
$('select[name="calc_shipping_provinces"]').each(function() {
  var $this = $(this),
    stc = ''
  c.forEach(function(i, e) {
    e += +1
    stc += '<option value=' + e + '>' + i + '</option>'
    $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
    if (address_1 = localStorage.getItem('address_1_saved')) {
      $('select[name="calc_shipping_provinces"] option').each(function() {
        if ($(this).text() == address_1) {
          $(this).attr('selected', '')
        }
      })
      $('input.billing_address_1').attr('value', address_1)
    }
    $this.on('change', function(i) {
      i = $this.children('option:selected').index() - 1
      var str = '',
        r = $this.val()
      if (r != '') {
        arr[i].forEach(function(el) {
          str += '<option value="' + el + '">' + el + '</option>'
          $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
        })
        var address_1 = $this.children('option:selected').text()
        var district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('address_1_saved', address_1)
        localStorage.setItem('district', district)
        $('select[name="calc_shipping_district"]').on('change', function() {
          var target = $(this).children('option:selected')
          target.attr('selected', '')
          $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
          var address_2 = target.text()
          $('input.billing_address_2').attr('value', address_2)
          district = $('select[name="calc_shipping_district"]').html()
          localStorage.setItem('district', district)
          localStorage.setItem('address_2_saved', address_2)
        })
      } else {
        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.removeItem('address_1_saved', address_1)
      }
    })
  })
})
//]]></script>