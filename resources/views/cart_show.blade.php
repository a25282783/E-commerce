@extends('layouts.app')
@section('content')
<section class="hero py-6">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb pl-0 ">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        <li class="breadcrumb-item active">購物車</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content">
        <h1 class="hero-heading">購物車</h1>
        <div><p class="lead text-muted">您有 {{$carts->count()}} 件商品在購物車中</p></div>
      </div>
    </div>
  </section>

  <!-- Shopping Cart Section-->
  <section>
    <form action="{{ route('update.cart') }}" id="cart_form" method="POST">
        @csrf
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 pr-xl-5">
          <div class="cart mb-5">
            <div class="cart-body">
              <!-- Product-->
              @foreach ($carts as $cart)
              <div class="cart-item">
                <div class="row d-flex align-items-center text-left text-md-center">
                  <div class="col-12 col-md-5">
                    <a class="cart-remove close mt-3 d-md-none" href="#"><i class="fa fa-times"></i>
                    </a>
                    <div class="d-flex align-items-center">
                        <a href="/product/{{ $cart->product_id }}">
                            <img class="cart-item-img" src="{{ $cart->product->prev_img }}" alt="...">
                        </a>
                      <div class="cart-title text-left">
                        <a class="text-dark link-animated" href="/product/{{ $cart->product_id }}">
                          <strong> {{ $cart->product->name }}</strong>
                        </a>
                        <br>
                        <span class="text-muted text-sm">
                            {{ $cart->color }}
                        </span>
                        <span class="text-muted text-sm">
                            {{ $cart->size }}
                        </span>
                        <span class="text-muted text-sm">
                            {{ $cart->pack }}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-7 mt-4 mt-md-0">
                    <div class="row align-items-center">
                      <div class="col-md-3">
                        <div class="row">
                          <div class="col-6 d-md-none text-muted">單價</div>
                          <div class="col-6 col-md-12 text-right text-md-center itemPrice" data-price="{{ $cart->product->price }}">${{ $cart->product->price }}</div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row align-items-center">
                          <div class="d-md-none col-7 col-sm-9 text-muted">數量</div>
                          <div class="col-5 col-sm-3 col-md-12">
                            <div class="d-flex align-items-center">
                              <div class="btn btn-items btn-items-decrease">-</div>
                              {{-- amount --}}
                              <input min="1" max="10" name="order[{{ $cart->id }}]" value="{{ $cart->amount }}" class="form-control text-center border-0 border-md input-items" type="text" >
                              {{-- amount --}}
                              <div class="btn btn-items btn-items-increase">+</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="row">
                            <div class="col-6 d-md-none text-muted">總共</div>
                            <div class="col-6 col-md-12 text-right text-md-center itemTotal">
                                ${{$cart->perItemTotalPrice}}
                            </div>
                        </div>
                      </div>
                      <div class="col-2 d-none d-md-block text-center dropItem" data-id="{{ $cart->id }}"><a class="cart-remove text-muted" href="#">
                          <svg class="svg-icon w-2rem h-2rem svg-icon-light">
                            <use xlink:href="#close-1"> </use>
                          </svg></a></div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- End of product -->
            </div>
          </div>
          <div class="d-flex justify-content-between flex-column flex-lg-row mb-5 mb-lg-0"><a class="btn btn-link text-muted" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> 繼續購物</a></div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-5">
            <div class="card-header">
              <h6 class="mb-0">訂單總覽</h6>
            </div>
            <div class="card-body py-4">
              <p class="text-muted text-sm">如果您有任何問題，請直接 <a href="#" data-toggle="modal" data-target="#contactmodel">聯繫我們</a>。</p>
              <table class="table card-text">
                <tr>
                    <th class="py-4">小計 </th>
                    <td class="py-4 text-right text-muted">
                        <span>$</span>
                        <span id="total-before">{{ $total_price }}</span>
                    </td>
                </tr>
                <tr>
                  <th class="py-4">運費</th>
                  <td class="py-4 text-right text-muted">
                      <span>$</span>
                      <span id="ship-fee">60</span>
                  </td>
                </tr>
                <tr>
                  <th class="pt-4">總計</th>
                  <td class="pt-4 text-right h3 font-weight-normal">
                    <span>$</span>
                    <span id="total"></span>
                  </td>
                </tr>
              </table>
              <a class="btn btn-dark btn-block btn-lg mb-3" href="checkout.html">結帳</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
@endsection
@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(function(){
    $('.dropItem').click(function(){
        target = $(this);
        var yes = confirm("確定刪除嗎?");
        if(yes){
            axios.post('/dropToCart', {
                id: $(this).data('id')
            })
            .then(function (response) {
                // 移除元素
                target.closest('.cart-item').remove();
            })
            .catch(function (error) {
            });
        }
    })
    // 每秒算一次帳
    setInterval(() => {
        var $total=0
        var $fee = $('#ship-fee').text();
        $('.cart-item').each(function(){
            var $price = $(this).find('.itemPrice')[0].dataset.price;
            var $amount = $(this).find('.input-items')[0].value;
            var subtotal = Number($price)*Number($amount);
            $total+=subtotal;
            $(this).find('.itemTotal')[0].innerHTML = '$'+subtotal;
        })
        $('#total-before').text($total)
        $('#total').text($total+Number($fee));

    }, 1500);
})
</script>
@endpush
