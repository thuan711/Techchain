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
<div class="single-product pt-5 mb-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Cấp quyền cho User: {{$user->ten}}
                    </div>
                    <form action="{{url('/insert_roles',[$user->id_user])}}" method="POST">
                        @csrf
                        @foreach($role as $key => $r)
                            @if(isset($all_column_roles))
                                <div class="form-check check-form-inline m-2">
                                    {{-- {{$r->id==$all_column_roles->id ? 'checked' : ''}} --}}
                                    <input type="radio" class="form-check-input"  {{$r->id==$all_column_roles->id ? 'checked' : ''}}  name='role' id="{{$r->id}}" value="{{$r->name}}">
                                    <label for="{{$r->id}}" class="form-check-label">{{$r->name}}</label>
                                </div>
                            @else
                                <div class="form-check check-form-inline p-2">
                                    <input type="radio" class="form-check-input" name='role' id="{{$r->id}}" value="{{$r->name}}">
                                    <label for="{{$r->id}}" class="form-check-label">{{$r->name}}</label>
                                <div class="form-check check-form-inline">
                            @endif
                        @endforeach
                        <br>
                        <input type="submit" name="insertroles" value="Cấp quyền cho user" class="btn p-2 mt-3 btn-primary">
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