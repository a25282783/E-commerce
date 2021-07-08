@extends('layouts.app')
@section('content')
    <!-- Hero Section-->
    <section class="hero py-6">
        <div class="container">
          <!-- Breadcrumbs -->
          <ol class="breadcrumb pl-0 ">
            <li class="breadcrumb-item"><a href="/">所有商家</a></li>
            <li class="breadcrumb-item"><a href="/order/list">訂單</a></li>
            <li class="breadcrumb-item active">訂單編號 #{{$order->serial_id}}</li>
          </ol>
          <!-- Hero Content-->
          <div class="hero-content">
            <h1 class="hero-heading">訂單編號 #{{$order->serial_id}}</h1>
            <div>
                <p class="lead text-muted">訂單 #{{$order->serial_id}} 於
                    <strong>{{ date("Y/m/d", strtotime($order->created_at)) }}</strong> 訂購，目前狀態
                    <strong>{{config('app.orderStatus')[$order->status]}}</strong>.
                </p>
            <p class="text-muted">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p></div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-xl-9">
              <div class="cart">
                <div class="cart-wrapper">
                  <div class="cart-header">
                    <div class="row">
                      <div class="col-6">商品</div>
                      <div class="col-2 text-center">價格</div>
                      <div class="col-2 text-right">數量</div>
                      <div class="col-2 text-right">小計</div>
                    </div>
                  </div>
                  <div class="cart-body">
                    @foreach ($order->products as $product)
                    <!-- Product-->
                    <div class="cart-item">
                        <div class="row d-flex align-items-center text-center">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <a href="/product/{{$product->id}}">
                                    <img class="cart-item-img" src="{{$product->prev_img}}" alt="...">
                                </a>
                            <div class="cart-title text-left">
                                <a class="text-dark" href="/product/{{$product->id}}">
                                    <strong>{{$product->name}}</strong>
                                </a><br>
                                <span class="text-muted text-sm">
                                    @php
                                        $detail = json_decode($product->pivot->detail,true);
                                        $detail = array_filter($detail, function ($value) {
                                            return !is_null($value) && $value !== '';
                                        });
                                    @endphp
                                    {{implode(',',$detail)}}
                                </span>
                            </div>
                            </div>
                        </div>
                        <div class="col-2">${{ $product->pivot->per_price }}</div>
                        <div class="col-2">{{ $product->pivot->per_amount }}
                        </div>
                        <div class="col-2 text-center">${{ $product->pivot->per_price*$product->pivot->per_amount }}</div>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>

              <!-- Order Sumary -->
              <div class="row my-5">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0">訂單總覽</h5>
                    </div>
                    <div class="card-body">
                      <p class="text-muted text-sm mb-4">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p>
                      <table class="table card-text">
                        <tr>
                          <th class="py-4">訂單金額 </th>
                          <td class="py-4 text-right text-muted">
                              ${{$order->total_price-60}}
                            </td>
                        </tr>
                        <tr>
                          <th class="py-4">運費</th>
                          <td class="py-4 text-right text-muted"> $60</td>
                        </tr>
                        <tr>
                          <th class="py-4">總金額</th>
                          <td class="py-4 text-right h3 font-weight-normal">
                              ${{$order->total_price}}
                            </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End of Order Sumary -->
                <div class="col-md-6">
                  <!-- Payment method -->
                  <div class="card mb-4">
                    <div class="card-header">
                      <h5 class="mb-0"> 付款方式</h5>
                    </div>
                    <div class="card-body p-4">
                      <p class="card-text text-muted">
                          <strong>{{data_get($receipt,'payment','')}}</strong>
                        </p>
                    </div>
                  </div>
                  <!-- End of Payment method -->
                  <!-- Shipping address -->
                  <div class="card mb-5">
                    <div class="card-header">
                      <h5 class="mb-0">運送方式</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text text-muted">
                            {{data_get($receipt,'name','')}}
                            <br>
                            {{data_get($receipt,'mobile','')}}
                            <br>
                            <strong>
                                {{data_get($receipt,'ship','')}}
                            </strong>
                        </p>
                    </div>
                  </div>
                  <!-- End of Shipping address -->
                  <!-- Invoice info -->
                  <div class="card mb-5">
                    <div class="card-header">
                      <h5 class="mb-0">發票資訊</h5>
                    </div>
                    <div class="card-body p-4">
                      <p class="card-text text-muted">電子發票<br><strong>Email：{{data_get($receipt,'email','')}}</strong></p>
                    </div>
                  </div>
                  <!-- End of Invoice info -->
                </div>
              </div>
            </div>

            <!-- Customer Sidebar-->
            <div class="col-xl-3 col-lg-4 mb-5">
              <div class="customer-sidebar card border-0">
                <div class="customer-profile">
                  <h5>{{auth()->user()->name}}</h5>
                </div>
                @include('mixin.profile-sidebar',['page'=>'order_list'])
              </div>
            </div>
            <!-- End of Customer Sidebar-->
          </div>
        </div>
      </section>
@endsection
