
@extends('layout')
@section('noidungchinh')
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Thành viên to</p>
						<h1>Quên mật khẩu</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form class="mt-5 p-5 ml-5" style="width:60%" method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email input -->
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Bạn quên mật khẩu? Không vấn đề, bạn hãy cho chúng tôi biết email của bạn, chúng tôi sẽ gửi mã xác thực về giúp bạn lấy lại mật khẩu.') }}
            </div>  
            <div class="form-outline mb-4">
                <label class="form-label" for="email" :value="__('Email')">Email</label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus class="form-control" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class=" mt-2 btn btn-primary btn-block">
                {{ __('Gửi email') }}
            </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Session Status -->
    

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Gửi email') }}
            </x-primary-button>
        </div>
    </form>
@endsection

