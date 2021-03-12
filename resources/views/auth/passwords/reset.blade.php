@extends('layouts.app')
@section('content')
<section id="person-login-register" class="top-bottom-empty">
	<!-- <div class="main-title-bottom"> -->
	<div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>LOGIN</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="info-bottom">
		<div class="container">
			<div class="row">
                <div class="col-12 col-xl-6 offset-xl-3">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>LOGIN</div>
                    </div>
                    <div class="form-wrap">
                        {{-- login --}}
						<form action="{{ route('login') }}" id="login-form" method="POST">
                            @csrf
                            <div class="item-wrap">
                                <label for="email">ACCOUNT</label>
                                <div class="input-wrap">
                                    <input name="email" type="email" placeholder="email address" value="{{ old('email') }}" required>
                                    @error('email')
                                    <label id="email-error" class="error" for="email">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="item-wrap">
                                <label for="password">PASSWORD</label>
                                <div class="input-wrap">
                                    <input name="password" id="password" type="password" placeholder="password" required>
                                    @error('password')
                                    <label id="email-error" class="error" for="email">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="item-wrap justify-content-between">
                                <label for="">
                                    <a class="forget-pswd-link" href="">
                                        Forget Password
                                    </a>
                                </label>
                                <label for="" class="register-label">
                                    <a class="register-link" href="{{ route('register') }}">
                                        Registration
                                    </a>
                                </label>
                            </div>

                            <div class="btn-area">
                                <button type="submit">LogIn</button>
                                <button class="fb-btn"><span class="fa fa-facebook"></span>Facebook LogIn</button>
                            </div>
                        </form>
                        {{-- login --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
