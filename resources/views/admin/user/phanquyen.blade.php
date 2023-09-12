@extends('admin.layoutad')
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
<div class="single-product pt-5 mb-150" style="font-size: 13px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Cấp quyền cho User: {{$user->ten}}
                    </div>
                    <form action="{{url('admin/insert_permission',[$user->id_user])}}" method="POST">
                        @csrf
                        @if(isset($name_roles))
                        <p class="ml-2">Vai trò hiện tại: {{$name_roles}}</p>
                        @endif
                        <br>
                        <p class="p-0 ml-2">Vai trò</p>
                        @foreach($permission as $key => $per)
                            <div class="form-check form-check-inline ml-2">
                                <input class="form-check-input" type="checkbox"
                                    @foreach($get_permission_via_role as $key => $get)
                                        @if($get->id == $per->id)
                                        checked
                                        @endif
                                    @endforeach
                                name="permission[]" id="{{$per->id}}" value="{{$per->id}}">
                                <label class="form-check-label" for="{{$per->id}}">{{$per->name}}</label>
                            </div> <br>
                        @endforeach
                        <br>
                        <input type="submit" name="insertroles" value="Cấp quyền cho user" class="btn p-2 mt-3 btn-primary">
                    </form>
                    <div class="card-header mt-5">
                        Thêm quyền cho User: {{$user->ten}}
                    </div>
                    <form class="p-3 " method="post" action="{{url('admin/insert_permission')}}">
                        @csrf
                        <div class="m-2">
                            <label>Tên quyền</label> 
                            <input class="form-control" type="text" placeholder="Tên quyền ...." name="permission" value="{{old('permission')}}">
                        </div>
                        <input type="submit" name="insertper" value="Thêm quyền" class="btn p-2 mt-3 btn-success">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Custom CSS styles for the form */
    .check-form-inline {
        display: inline-block;
        margin-right: 15px; /* Adjust this margin as needed */
    }

    .form-check-input {
        margin-right: 5px; /* Add some space between the radio button and label */
    }

    .form-check-label {
        font-size: 14px; /* Adjust font size as needed */
        color: #333; /* Set label color */
    }

</style>
@endsection