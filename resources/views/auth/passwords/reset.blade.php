@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">重設密碼</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading mb-3">重設密碼</h1>
        <div><p class="text-muted">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p></div>

      </div>
    </div>
  </section>
  <!-- customer login-->
  <section class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-4 px-5">
              <h5 class="mb-0">重設密碼</h5>
            </div>
            <div class="card-body p-5">
              <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label class="form-label" for="email">帳號</label>
                    <input name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" class="form-control" id="email" >
                    @error('email')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label class="form-label" for="passwordLogin">新密碼</label>
                  <input name="password" type="password" required class="form-control" id="passwordLogin">
                  @error('password')
                  <span class="form-required text-danger">
                      確認密碼不一致
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-label" for="password-confirm">再輸入一次密碼</label>
                  <input name="password_confirmation" type="password" required class="form-control" id="password-confirm">
                </div>
                <button class="btn btn-dark" type="submit"><i class="fa fa-sign-in-alt mr-2"></i> 送出</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
