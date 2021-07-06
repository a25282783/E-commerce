@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">驗證信箱</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading mb-3">驗證信箱</h1>
        <div><p class="text-muted">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p></div>

      </div>
    </div>
  </section>
  <section class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-4 px-5">
              <h5 class="mb-0">驗證信箱</h5>
            </div>
            <div class="card-body p-5">
              <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                @if (session('resent'))
                <div class="form-group">
                  <label class="form-label" for="emailLogin">
                      已寄送驗證訊息
                  </label>
                </div>
                @endif
                <button class="btn btn-dark" type="submit"><i class="fa fa-sign-in-alt mr-2"></i>再寄一次</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
