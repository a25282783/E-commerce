@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">訂單已確認        </li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading">訂單已確認</h1>
        <div><div role="alert" class="d-flex align-items-center alert alert-success"><svg class="svg-icon w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3"><use xlink:href="#checked-circle-1"> </use></svg>您的訂單已確認！</div></div>
      </div>
    </div>
  </section>

  <!-- Order confirmed-->
  <section class="pb-6">
    <div class="container">
      <p class="lead">Hi {{auth()->user()->name}}，您的訂單已確認，感謝您的購買。</p>
      <p class="lead mb-5">您的訂單正在處理中，開始運送時，我們會以Email通知您。 </p>
      <p class="mb-6"><a class="btn btn-outline-dark" href="/order/list/{{ $order->id }}">管理訂單</a></p>
      <div class="p-5 bg-gray-100">
        <div class="row text-break">
          <div class="col-6 col-lg-3 mb-5 mb-lg-0">
            <div class="text-sm text-uppercase text-muted mb-3">訂單編號</div><span class="h5">
                {{ $order->serial_id }}
            </span>
          </div>
          <div class="col-6 col-lg-3 mb-5 mb-lg-0">
            <div class="text-sm text-uppercase text-muted mb-3">訂單日期</div><span class="h5">
                {{ $order->created_at }}
            </span>
          </div>
          <div class="col-6 col-lg-3">
            <div class="text-sm text-uppercase text-muted mb-3">總金額</div><span class="h5">
                ${{ $order->total_price }}
            </span>
          </div>
          <div class="col-6 col-lg-3">
            <div class="text-sm text-uppercase text-muted mb-3">運送方式</div><span class="h5">
                {{ $order->receipt['ship'] }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
