@extends('layout')
@section('noidungchinh')
<div class="breadcrumb-sectiona breadcrumb-bg1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Thành viên to</p>
						<h1>Nhập lại mật khẩu</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form class="mt-5 p-5 ml-5" style="width:60%" method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-outline mb-4">
            <label class="form-label" for="email" :value="__('Email')">Email</label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" class="form-control" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-outline mb-4">
            <label class="form-label" for="password" :value="__('Password')">Mật khẩu</label>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" class="form-control"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-outline mb-4">
            <label class="form-label" for="password_confirmation" :value="__('Confirm Password')">Nhập lại mật khẩu</label>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" class="form-control"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Đặt lại mật khẩu') }}
            </x-primary-button>
        </div>
    </form>
@endsection
