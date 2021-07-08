@extends('layouts.app')
@section('content')
    <!-- Hero Section-->
    <section class="hero py-6">
        <div class="container">
          <!-- Breadcrumbs -->
          <ol class="breadcrumb pl-0 ">
            <li class="breadcrumb-item"><a href="/l">所有商家</a></li>
            <li class="breadcrumb-item active">結帳        </li>
          </ol>
          <!-- Hero Content-->
          <div class="hero-content">
            <h1 class="hero-heading">結帳</h1>
            <div>
              {{-- <p class="lead text-muted">若您已是會員，請 <a href="#" data-toggle="modal" data-target="#loginModal">登入會員</a> 快速結帳或 <a href="#" data-toggle="modal" data-target="#loginModal">立即註冊</a> 享有完整會員功能</p> --}}
            </div>
          </div>
        </div>
      </section>
      <!-- Checkout-->
      <div class="container pb-6">
        <div class="row">
          <div class="col-lg-7 pr-xl-6">
            <form action="{{ Route('create.order') }}" method="POST" id="form-order">
                @csrf
              <h5 class="mb-5">收件人 </h5>
              <div class="row">
                <div class="form-group col-md-6 mb-4">
                  <label class="form-label" for="fullname_invoice">姓名(必填)</label>
                  <input type="text" name="name" value="{{$user->name}}"  class="form-control form-control-underlined pl-0" id="fullname_invoice" required>
                </div>

                <div class="form-group col-md-6 mb-4">
                  <label class="form-label" for="phonenumber_invoice">手機號碼(必填)</label>
                  <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control form-control-underlined pl-0" id="phonenumber_invoice" required>
                </div>

                <div class="form-group col-md-12 mb-4">
                  <label class="form-label" for="emailaddress_invoice">電子信箱(必填)</label>
                  <input type="text" name="email" value="{{$user->email}}" class="form-control form-control-underlined pl-0" required>
                </div>
                {{-- 發票 --}}
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" id="invocie" type="radio" name="invocie">
                  <label class="custom-control-label text-sm font-weight-normal" for="invocie" data-toggle="collapse" data-target="#invocie">開立三聯式發票</label>
                </div>
                <div class="row collapse form-group col-md-12 mb-5" id="invocie" >
                    <div class="form-group col-md-5 mb-5" >
                      <label class="form-label text-sm" for="company_name">公司抬頭</label>
                      <input class="form-control form-control-underlined pl-0 text-sm" type="text" name="company_name" id="company_name">

                    </div>
                    <div class="form-group col-md-5 mb-5">
                      <label class="form-label text-sm" for="tax_number">統一編號</label>
                      <input class="form-control form-control-underlined pl-0 text-sm" type="text" name="tax_number" id="tax_number">
                    </div>
                </div>
                {{-- 運送 --}}
                <div class="form-group col-12 mt-3">
                  <h5 class="mb-3">運送方式 </h5>
                  <div class="custom-control custom-checkbox" >
                    <input type="radio" name="ship" value="宅配"  class="custom-control-input" id="ship" data-toggle="collapse" data-target="#shippingAddress" aria-expanded="false" aria-controls="ship" role="checkbox" >
                    <label class="custom-control-label align-middle" for="ship">宅配</label><br>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="radio" name="ship" value="店到店"  class="custom-control-input" id="storetostore" data-toggle="collapse" data-target="#shippingAddress" aria-expanded="false" aria-controls="storetostore" role="checkbox">
                    <label class="custom-control-label align-middle" for="storetostore">店到店</label><br>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="radio" name="ship" value="台北校區取貨" class="custom-control-input" id="scutaipei"  data-toggle="collapse" data-target="#shippingAddress" aria-expanded="false" aria-controls="scutaipei" role="checkbox">
                    <label class="custom-control-label align-middle" for="scutaipei">台北校區取貨</label><br>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="radio" name="ship" value="高雄校區取貨" class="custom-control-input" id="scukh" data-toggle="collapse" data-target="#shippingAddress" aria-expanded="false" aria-controls="scukh" role="checkbox">
                    <label class="custom-control-label align-middle" for="scukh">高雄校區取貨</label>
                  </div>
                </div>
              </div>

              <!-- Shippping Address-->
              <div class="collapse" id="shippingAddress">
                <h5 class="my-4">收件地址 </h5>
                <div class="row">
                  <div class="form-group col-md-6 mb-4">
                    <label class="form-label" for="zip_invoice">郵遞區號</label>
                    <input class="form-control form-control-underlined pl-0" type="text" name="zip_invoice" id="zip_invoice">
                  </div>

                  <div class="form-group col-md-6 mb-4">
                    <label class="form-label" for="state_invoice">縣市</label>
                    <input class="form-control form-control-underlined pl-0" type="text" name="state_invoice" id="state_invoice">
                  </div>

                  <div class="form-group col-md-6 mb-4">
                    <label class="form-label" for="city_invoice">鄉鎮市區</label>
                    <input class="form-control form-control-underlined pl-0" type="text" name="city_invoice" id="city_invoice">
                  </div>

                  <div class="form-group col-md-6 mb-4">
                    <label class="form-label" for="street_invoice">街道地址</label>
                    <input class="form-control form-control-underlined pl-0" type="text" name="street_invoice" id="street_invoice">
                  </div>
                </div>
              </div>
              <!-- /Shipping Address                            -->
            </form>
          </div>


          <div class="col-lg-5">
            <h5 class="mb-5">訂單總覽</h5>
            <table class="table border-bottom border-dark mb-5">
                @foreach ($carts as $cart)
                <tr class="text-sm">
                    <th class="py-4 font-weight-normal text-muted">{{$cart->product->name}}<span>x {{$cart->amount}}</span></th>
                    <td class="py-4 text-right text-muted">${{$cart->total_price}}</td>
                  </tr>
                @endforeach
              <tr>
                <th class="py-4 text-uppercase font-weight-normal text-sm align-bottom">小計 </th>
                <td class="py-4 text-right text-muted">${{$order_price}}</td>
              </tr>
              <tr>
                <th class="py-4 text-uppercase font-weight-normal text-sm align-bottom">運費 </th>
                <td class="py-4 text-right text-muted">$60</td>
              </tr>
              <tr>
                <th class="py-4 text-uppercase font-weight-normal border-dark align-bottom">總計</th>
                <td class="py-4 text-right h3 font-weight-normal border-dark">${{$order_price+60}}</td>
              </tr>
              {{-- 付款方式 --}}
              <tr>
                <th class="pt-5 pb-4 border-dark" colspan="2">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="payment" value="信用卡付款" class="custom-control-input" id="payment0" checked>
                    <label class="custom-control-label text-sm font-weight-normal" for="payment0" data-toggle="collapse" data-target="#paymentinfo_0">信用卡付款</label>
                  </div>
                  <div class="collapse show" id="paymentinfo_0" data-parent="table.table">
                    <div class="pt-4">
                      <p class="text-muted text-sm">信用卡付款</p>
                    </div>
                  </div>
                </th>
              </tr>

              <tr>
                <th class="py-4" colspan="2">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="payment" value="ATM轉帳" class="custom-control-input" id="payment1" >
                    <label class="custom-control-label text-sm font-weight-normal" for="payment1" data-toggle="collapse" data-target="#paymentinfo_1">ATM轉帳</label>
                  </div>
                  <div class="collapse" id="paymentinfo_1" data-parent="table.table">
                    <div class="pt-4">
                      <p class="text-muted text-sm">ATM轉帳</p>
                    </div>
                  </div>
                </th>
              </tr>

              <tr>
                <th class="py-4" colspan="2">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="payment" value="貨到付款" class="custom-control-input" id="payment2" >
                    <label class="custom-control-label text-sm font-weight-normal" for="payment2" data-toggle="collapse" data-target="#paymentinfo_2">貨到付款</label>
                  </div>
                  <div class="collapse" id="paymentinfo_2" data-parent="table.table">
                    <div class="pt-4">
                      <p class="text-muted text-sm">貨到付款</p>
                    </div>
                  </div>
                </th>
              </tr>

              <tr>
                <th class="py-4" colspan="2">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="payment" value="台北校區自取現場付款" class="custom-control-input" id="payment3">
                    <label class="custom-control-label text-sm font-weight-normal" for="payment3" data-toggle="collapse" data-target="#paymentinfo_3">台北校區自取現場付款</label>
                  </div>
                  <div class="collapse" id="paymentinfo_3" data-parent="table.table">
                    <div class="pt-4">
                      <p class="text-muted text-sm">台北校區自取現場付款</p>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th class="py-4" colspan="2">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="payment" value="高雄校區自取現場付款" class="custom-control-input" id="payment4" >
                    <label class="custom-control-label text-sm font-weight-normal" for="payment4" data-toggle="collapse" data-target="#paymentinfo_4">高雄校區自取現場付款</label>
                  </div>
                  <div class="collapse" id="paymentinfo_4" data-parent="table.table">
                    <div class="pt-4">
                      <p class="text-muted text-sm">高雄校區自取現場付款</p>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th class="pt-4 pb-5" colspan="2">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="payment" value="由實踐大學匯款" class="custom-control-input" id="payment5">
                    <label class="custom-control-label text-sm font-weight-normal" for="payment5" data-toggle="collapse" data-target="#paymentinfo_5">由實踐大學匯款</label>
                  </div>
                  <div class="collapse" id="paymentinfo_5" data-parent="table.table">
                    <div class="pt-4">
                      <p class="text-muted text-sm">由實踐大學匯款</p>
                    </div>
                  </div>
                </th>
              </tr>
            </table>
            <p class="text-muted text-sm">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.</p>
            <p class="text-muted text-sm mb-5">I have read and agree to the website <a href="#">terms and conditions</a>. * </p><a class="btn btn-dark btn-block btn-lg mb-5" href="javascript:void(0);" onclick="document.getElementById('form-order').submit()">付款</a>
            <!-- this should be <button type="submit"> on your site-->
          </div>
        </div>
      </div>
@endsection
