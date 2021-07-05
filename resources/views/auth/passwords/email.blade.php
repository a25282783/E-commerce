@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">忘記密碼</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading mb-3">忘記密碼</h1>
        <div><p class="text-muted">請輸入電子郵件，我們會寄出確認信給您。</p></div>
      </div>
    </div>
  </section>
  @if (session('status'))
  <div class="d-block" id="addToCartAlert">
    <div class="mb-4 mb-lg-5 alert alert-success" role="alert">
      <div class="d-flex align-items-center pr-3">
        <svg class="svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3">
          <use xlink:href="#checked-circle-1"> </use>
        </svg>
        <p class="mb-0">已寄出確認信</p>
      </div>
      <button class="close close-absolute close-centered opacity-10 text-inherit" type="button" data-dismiss="alert" aria-label="Close">
        <svg class="svg-icon w-2rem h-2rem">
          <use xlink:href="#close-1"> </use>
        </svg>
      </button>
    </div>
  </div>
    @endif
  <!-- customer login-->
  <section class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-4 px-5">
              <h5 class="mb-0">忘記密碼</h5>
            </div>
            <div class="card-body p-5">
              <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label class="form-label" for="emailLogin">請輸入電子郵件</label>
                  <input name="email" type="email" value="{{ old('email') }}" required class="form-control" id="emailLogin" >
                  @error('email')
                  <span class="form-required text-danger">
                    {{ $message }}
                    </span>
                  @enderror
                </div>
                <button class="btn btn-dark" type="submit"><i class="fa fa-sign-in-alt mr-2"></i> 送出</button><!-- 回到首頁 -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
