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
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Cấp quyền cho User: {{$user->ten}}
                </div>
                <form action="{{url('/insert_roles',[$user->id_user])}}" method="POST">
                    @csrf
                    @foreach($role as $key => $r)
                        <div class="form-check check-form-inline">
                            {{-- {{$r->id==$all_column_roles->id ? 'checked' : ''}} --}}
                            <input type="text" class="form-check-input" type='radio' name='role' id="{{$r->id}}" value="{{$r->name}}">
                            <label for="{{$r->id}}" class="form-check-label">{{$r->ten}}</label>
                        </div>
                    @endforeach
                    <br>
                    <input type="submit" name="insertroles" value="Cấp quyền cho user" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>