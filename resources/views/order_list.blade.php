@extends('layouts.app')
@section('content')
 <!-- Hero Section-->
 <section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">所有訂單</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading">所有訂單</h1>
        <div><p class="text-muted">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p></div>
      </div>
    </div>
  </section>
  <section class="pb-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-xl-9">
          <table class="table table-hover table-responsive-md">
            <thead class="bg-light">
              <tr>
                <th class="py-4 pl-4 text-sm border-0">訂單編號</th>
                <th class="py-4 text-sm border-0">日期</th>
                <th class="py-4 text-sm border-0">總金額</th>
                <th class="py-4 text-sm border-0">狀態</th>
                <th class="py-4 text-sm border-0"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th class="pl-4 py-5 align-middle"># {{$item->serial_id}}</th>
                    <td class="py-5 align-middle">{{date("Y/m/d", strtotime($item->created_at))}}</td>
                    <td class="py-5 align-middle">${{$item->total_price}}</td>
                    <td class="py-5 align-middle">
                        <span class="badge badge-info-light">
                            {{config('app.orderStatus')[$item->status]}}
                        </span>
                    </td>
                    <td class="py-5 align-middle">
                        <a class="btn btn-outline-dark btn-sm" href="/order/list/{{$item->id}}">
                            查看訂單
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- Customer Sidebar-->
        <div class="col-xl-3 col-lg-4 mb-5">
          <div class="customer-sidebar card border-0">
            <div class="customer-profile"><a class="d-inline-block" href="#"><img class="img-fluid rounded-circle customer-image" src="img/avatar/avatar-0.jpg" alt=""></a>
              <h5>{{auth()->user()->name}}</h5>
            </div>
            @include('mixin.profile-sidebar',['page'=>'order'])
          </div>
        </div>
        <!-- /Customer Sidebar-->
      </div>
    </div>
  </section>
@endsection
