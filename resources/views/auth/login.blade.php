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
                                </div>
                            </div>
                            @error('email')
                            <span class="form-required">
                                {{ $message }}
                            </span>
                            @enderror
                            <div class="item-wrap">
                                <label for="password">PASSWORD</label>
                                <div class="input-wrap">
                                    <input name="password" id="password" type="password" placeholder="password" required>
                                </div>
                            </div>
                            @error('password')
                            <span class="form-required">
                                {{ $message }}
                            </span>
                            @enderror
                            <div class="item-wrap justify-content-between">
                                <label for="">
                                    <a class="forget-pswd-link" href="javascript:;">
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
@if (session('status'))
<div class="mask"></div>
<div class="forget-pswd-page suc info-bottom">
    <div class="form-wrap">
        <div class="title">
            <span>forget password</span>
            <div class="close-btn">✕</div>
        </div>
        <div class="content">
            <div class="svg">
                <img src="/img/svg/mail-icon.svg" alt="">
            </div>
            <p>{{ session('status') }}</p>
        </div>
        <div class="btn-area">
            <button type="submit" class="close-btn">確定</button>
        </div>
    </div>
</div>
<script>
    $(".mask").css("display", "block");
    $("header, .header-input, section, footer").addClass("blur-class");
</script>
@endif
<div class="mask" ></div>
<div class="forget-pswd-page forget info-bottom" style="opacity: 0">
    <div class="form-wrap">
        <div class="title">
            <span>Forget Password</span>
            <div class="close-btn">✕</div>
        </div>
        {{-- forget password --}}
		<form id="forget-pswd-suc" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="item-wrap">
                <label for="">Email Address</label>
                <div class="input-wrap">
                    <input name="email" type="email" placeholder="" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="btn-area">
                <button type="submit">Submit</button>
            </div>
        </form>
        {{-- forget password --}}
	</div>
</div>
@endsection
