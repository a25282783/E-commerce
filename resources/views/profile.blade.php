@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">個人資訊</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading">個人資訊</h1>
        <div><p class="lead text-muted">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p></div>
      </div>
        @if (session('status'))
        <div class="d-block">
            <div class="mb-4 mb-lg-5 alert alert-success" role="alert">
                <div class="d-flex align-items-center pr-3">
                <svg class="svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3">
                    <use xlink:href="#checked-circle-1"> </use>
                </svg>
                <p class="mb-0">{{ session('status') }}</p>
                </div>
                <button class="close close-absolute close-centered opacity-10 text-inherit" type="button" data-dismiss="alert" aria-label="Close">
                <svg class="svg-icon w-2rem h-2rem">
                    <use xlink:href="#close-1"> </use>
                </svg>
                </button>
            </div>
        </div>
        @endif
    </div>
  </section>
  <section class="pb-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-xl-9 mb-5 mb-lg-0">
          <div class="mb-5">
            <h3 class="mb-5">變更密碼</h3>
            <form action="{{ route('password.update.custom') }}" method="POST">
                @csrf
                <input name="email" type="hidden" value="{{ $user->email }}">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="form-label" for="password_old">舊密碼</label>
                    <input name="old_password" value="{{ $old_password ?? old('old_password') }}" class="form-control" id="password_old" type="text">
                    @error('old_password')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="form-label" for="password_1">新密碼</label>
                    <input name="password" type="password" class="form-control" id="password_1">
                    @error('password')
                    <span class="form-required text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="form-label" for="password_2">請再輸入一次新密碼</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_2">
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <button class="btn btn-dark" type="submit"><i class="far fa-save mr-2"></i>確認變更</button>
              </div>
            </form>
          </div>
          <hr class="mb-5">
          <h3 class="mb-5">個人資訊</h3>
          <form action="{{ route('update.user') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="firstname">姓名</label>
                  <input name="name" type="text" required value="{{ old('name')?old('name'):$user->name }}" class="form-control" id="firstname" >
                  @error('name')
                  <span class="form-required text-danger">
                    {{ $message }}
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="phone">手機</label>
                  <input name="mobile" type="number" required value="{{ old('mobile')?old('mobile'):$user->mobile }}" class="form-control" id="phone">
                  @error('mobile')
                  <span class="form-required text-danger">
                    {{ $message }}
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="emailAccount">Email</label>
                  <input class="form-control" id="emailAccount" type="text" value="{{ $user->email }}" disabled>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <div class="mt-4"></div>
            <button class="btn btn-dark" type="submit"><i class="far fa-save mr-2"></i>確認變更</button>
          </form>
        </div>

     <!-- Customer Sidebar-->
     <div class="col-xl-3 col-lg-4 mb-5">
       <div class="customer-sidebar card border-0">
         <div class="customer-profile">
             {{-- <a class="d-inline-block" href="#"><img class="img-fluid rounded-circle customer-image" src="img/avatar/avatar-0.jpg" alt=""></a> --}}

           <h5>{{ $user->name }}</h5>
         </div>
         @include('mixin.profile-sidebar',['page'=>'profile'])
       </div>
     </div>
     <!-- /Customer Sidebar-->
   </div>
 </div>
</section>
@endsection
