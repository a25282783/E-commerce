@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">登入｜註冊</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading mb-3">登入｜註冊</h1>
        <div><p class="text-muted">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p></div>

      </div>
    </div>
</section>
<section class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header py-4 px-5">
              <h5 class="mb-0">登入</h5>
            </div>
            <div class="card-body p-5">
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="emailLogin">電子郵件</label>
                    <input name="email" type="email" id="emailLogin" value="{{ old('email') }}" required class="form-control">
                    @error('email')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="passwordLogin">密碼</label>
                    <input name="password" type="password" id="passwordLogin"  required class="form-control">
                    @error('password')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button class="btn btn-dark" type="submit"><i class="fa fa-sign-in-alt mr-2"></i> 登入</button>
                <button class="btn btn-dark" type="button"><a href="forget-password" class="text-decoration-none text-white">忘記密碼</a></button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="card">
            <div class="card-header py-4 px-5">
              <h5 class="mb-0">註冊</h5>
            </div>
            <div class="card-body p-5">
              <p class="lead">曾使用非會員身分結帳？</p>
              <p class="text-muted text-sm">請使用先前結帳的 電子郵件 註冊，我們會將您過往訂單自動帶入您的帳號。</p>
              <p class="text-muted text-sm">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p>
              <hr class="my-4">
              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name"><span class="text-danger">*</span>姓名</label>
                    <input name="name" class="form-control" id="name" type="text" required value="{{ old('name') }}">
                    @error('name')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="emailSignup"><span class="text-danger">*</span>電子郵件</label>
                    <input name="email-r" type="email" class="form-control" id="emailSignup" autocomplete="email" required value="{{ old('email') }}">
                    @error('email-r')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="passwordSignup"><span class="text-danger">*</span>密碼</label>
                    <input name="password-r" type="password"  class="form-control" id="passwordSignup" required>
                    @error('password-r')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button class="btn btn-dark" type="submit">
                    <i class="far fa-user mr-2"></i>
                    註冊
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
