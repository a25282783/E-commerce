@extends('layouts.app')
@section('content')
<section id="person-login-register" class="top-bottom-empty">
	<!-- <div class="main-title-bottom"> -->
	<div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>RESET PASSWORD</h1>
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
                        <div>RESET PASSWORD</div>
                    </div>
                    <div class="form-wrap">
						<form action="{{ route('password.update') }}" id="login-form" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="item-wrap">
                                <label for="email">ACCOUNT</label>
                                <div class="input-wrap">
                                    <input name="email" type="email" placeholder="email address" value="{{ $email ?? old('email') }}" required autocomplete="email">
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
                            <div class="item-wrap">
                                <label for="password-confirm">CONFIRM PASSWORD</label>
                                <div class="input-wrap">
                                    <input name="password_confirmation" id="password-confirm" type="password" placeholder="password"  required>
                                </div>
                            </div>


                            <div class="btn-area justify-content-center">
                                <button type="submit">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
