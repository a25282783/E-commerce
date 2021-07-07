@extends('layouts.app')
@section('content')
<style>
    .product-name-wrap{
        cursor:pointer;
    }
</style>
<section id="shop-cart" class="cart2">
    <div class="main-title-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>SHOPPING CART</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-form-wrap">
        {{-- 商品總覽 --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>Product</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-bottom">
                        <div class="title-wrap">
                            <div class="col-12 col-lg-4">Product</div>
                            <div class="col-12 col-lg-2">Price</div>
                            <div class="col-12 col-lg-2">Quantity</div>
                            <div class="col-12 col-lg-2">Subtotal</div>
                        </div>
                        {{-- 商品 --}}
                        @foreach ($data as $cart)
                        <div class="list-wrap">
                            <div class="col-12 col-lg-4">
                                <div class="list-inner-title">Product</div>
                                <div class="product-name-wrap flex-wraper" onclick="location.href='/product/{{ $cart->product_id }}'" >
                                    <div class="img-wrap">
                                        <img src="/uploads/{{ $cart->product->prev_img }}" alt="">
                                    </div>
                                    <div class="text-wrap">
                                        <div class="product-name">
                                            {{ $cart->product->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2">
                                <div class="list-inner-title">Price</div>
                                <div class="flex-wraper">
                                    US${{ $cart->product->price }}
                                </div>
                            </div>
                            <div class="col-12 col-lg-2"
                                data-price="{{ $cart->product->price }}"
                                data-amount="{{ $cart->amount }}"
                                data-product_amount="{{ $cart->product->amount }}" >
                                <div class="list-inner-title">Quantity</div>
                                <div class="flex-wraper">
                                    <div class="input-wrap count">
                                        <input min="1" class="spinner" type="number"
                                        value="{{ $cart->amount }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2">
                                <div class="list-inner-title">Subtotal</div>
                                <div class="flex-wraper">
                                    US$
                                    <span>{{ $cart->perItemTotalPrice }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- product --}}
                        {{-- 總計 --}}
                        <div class="total-wrap">
                            <div class="col-8 col-lg-4 offset-4 offset-lg-6">
                                <div class="item-wrap">
                                    <div class="label main-label">Total</div>
                                    <div class="price main-total" id="total_price">
                                        US$
                                        <span>{{ $total_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 付款 --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>Delivery Method</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-bottom shipping-radio-area">

                        <div class="radio-area">
                            <div class="radio-wrap active">
                                <label>
                                    <div class="img-wrap">
                                        @if (isset($basic))
                                        <img src="/uploads/{{ $basic->delivery }}" alt="">
                                        <div class="text">{{ $basic->delivery_name }}</div>
                                        @else
                                        <img src="img/cart/svg/icon-01.svg" alt="">
                                        <div class="text">Taiwan Post Office</div>
                                        @endif
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="radio-textarea">
                            <div class="radio-text-wrap">
                                <p>
                                @if (isset($basic))
                                    {!! nl2br($basic->delivery_desc) !!}
                                @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>Payment Method</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-bottom payment-radio-area">
                        <div class="radio-area">
                            <div class="radio-wrap active">
                                <label>
                                    <div class="img-wrap">
                                        @if (isset($basic))
                                        <img src="/uploads/{{ $basic->payment }}" alt="">
                                        <div class="text">{{ $basic->payment_name }}</div>
                                        @else
                                        <img src="img/cart/svg/icon-05.svg" alt="">
                                        <div class="text">Credit Card</div>
                                        @endif
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="radio-textarea">
                            <div class="radio-text-wrap">
                                <p>
                                @if (isset($basic))
                                {!! nl2br($basic->payment_desc) !!}
                                @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- User --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>User</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-bottom info-bottom">
                        <div class="row form-wrap">
                            <div class="col-12 col-xl-6 order-9">
                                <div class="item-wrap">
                                    <label for="">FIRST NAME</label>
                                    <div class="input-wrap">
                                        <input class="order-name" name="order-firstName" type="text" readonly="readonly" value="{{$user->first_name}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 order-12">
                                <div class="item-wrap">
                                    <label for="">E-MAIL</label>
                                    <div class="input-wrap">
                                        <input type="text" name="order-mail" readonly="readonly" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-6 order-10">
                                <div class="item-wrap">
                                    <label for="">LAST NAME</label>
                                    <div class="input-wrap">
                                        <input class="order-name" name="order-lastName" type="text" readonly="readonly" value="{{$user->last_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 order-11">
                                <div class="item-wrap">
                                    <label for="">PHONE NUMBER</label>
                                    <div class="input-wrap">
                                        <input class="order-phone" name="order-phone" type="text" readonly="readonly" value="{{$user->mobile}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>Recipient</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-bottom info-bottom">
                        <div class="row form-wrap">
                            <div class="col-12 col-lg-6 order-1">
                                <div class="item-wrap">
                                    <label for="">
                                        FIRST NAME
                                    </label>
                                    <div class="input-wrap">
                                        <input class="receiver-name" name="first_name" type="text" value="{{$cart->receipt['first_name']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-4">
                                <div class="item-wrap">
                                    <label for="">
                                        E-MAIL
                                    </label>
                                    <div class="input-wrap">
                                        <input type="text" name="email" value="{{$cart->receipt['email']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-2">
                                <div class="item-wrap">
                                    <label for="">
                                        LAST NAME
                                    </label>
                                    <div class="input-wrap">
                                        <input class="receiver-name" name="last_name" type="text" value="{{$cart->receipt['last_name']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-3">
                                <div class="item-wrap">
                                    <label for="">
                                        PHONE NUMBER
                                    </label>
                                    <div class="input-wrap">
                                        <input class="receiver-phone" name="mobile" type="text" value="{{$cart->receipt['mobile']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 order-5">
                                <div class="item-wrap address-wrap">
                                    <label for="">
                                        ADDRESS
                                    </label>
                                    <div class="input-wrap">
                                        <div class="address-input">
                                            <input class="receiver-address" name="address" type="text" value="{{$cart->receipt['address']}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-7">
                                <div class="item-wrap">
                                    <label for="">CITY</label>
                                    <div class="input-wrap">
                                        <input name="city" type="text" value="{{$cart->receipt['city']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-8">
                                <div class="item-wrap">
                                    <label for="">STATE/PROVINCE/REGION</label>
                                    <div class="input-wrap">
                                        <input name="state" type="text" value="{{$cart->receipt['state']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-9">
                                <div class="item-wrap">
                                    <label for="">ZIP</label>
                                    <div class="input-wrap">
                                        <input name="zip_code" type="text" value="{{$cart->receipt['zip_code']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 order-10">
                                <div class="item-wrap">
                                    <label for="">COUNTRY</label>
                                    <div class="input-wrap">
                                        <input name="country" type="text" value="{{$cart->receipt['country']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 order-11">
                                <div class="item-wrap textarea-wrap">
                                    <label for="">NOTE</label>
                                    <div class="input-wrap">
                                        <textarea placeholder="ENTER TEXT" style="white-space: normal;" rows="6" disabled>
                                            {!! $cart->receipt['note'] !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="btn-area apply-btn-area">
                <button onclick="location.href='/cart'">BACK</button>
                <button onclick="location.href='/cart/order'">Confirm order</button>
            </div>
        </div>
    </div>
</section>

@endsection
