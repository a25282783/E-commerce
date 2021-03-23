@extends('layouts.app')
@section('content')
<style>
    .form-required{
        padding: 0 !important;
        color: #e60e0efa;
    }
    .product-name-wrap{
        cursor:pointer;
    }
</style>
<section id="shop-cart">
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
        <form action="{{ route('update.cart') }}" id="cart_form" method="POST">
            @csrf
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
                                <div class="col-12 col-lg-2">Cancle</div>
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
                                        @if ($cart->product->detail['sale'])
                                            US${{ $cart->product->detail['sale'] }}
                                        @else
                                            US${{ $cart->product->detail['price'] }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2"
                                    @if ($cart->product->detail['sale'])
                                    data-price="{{ $cart->product->detail['sale'] }}"
                                    @else
                                    data-price="{{ $cart->product->detail['price'] }}"
                                    @endif
                                    data-amount="{{ $cart->amount }}"
                                    data-product_amount="{{ $cart->product->amount }}" >
                                    <div class="list-inner-title">Quantity</div>
                                    <div class="flex-wraper" style="flex-direction: column;">
                                        <div class="input-wrap count">
                                            <input min="1" class="spinner" type="number"
                                            value="{{ $cart->amount }}" name="order[{{ $cart->id }}]">
                                            <div class="spin add" @click="addCount">▲</div>
                                            <div class="spin sub" @click="minusCount">▼</div>
                                        </div>
                                        @if (session('shortage')&&in_array($cart->product_id,session('shortage')))
                                        <span class="form-required">Shortage</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2">
                                    <div class="list-inner-title">Subtotal</div>
                                    <div class="flex-wraper">
                                        US$
                                        <span>{{ $cart->perItemTotalPrice }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2">
                                    <div class="list-inner-title"></div>
                                    <div class="flex-wraper">
                                        <button class="delete-btn" @click="drop" data-id="{{ $cart->id }}">✕</button>
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
                                            <input class="order-name" name="order-firstName" type="text" readonly="readonly" value="{{$user->first_name}}">
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
                                <div class="col-12">
                                    <div class="item-wrap">
                                        <div class="ui checkbox">
                                            <input type="checkbox" class="same-person" v-model="checked">
                                            <label>Check with User</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-1">
                                    <div class="item-wrap">
                                        <label for="">
                                            <span class="form-required">*</span>
                                            FIRST NAME
                                        </label>
                                        <div class="input-wrap">
                                            <input class="receiver-name" name="first_name" type="text" :value="(checked)?'{{$user->first_name}}':''" required>
                                            @error('first_name')
                                            <span class="form-required">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-4">
                                    <div class="item-wrap">
                                        <label for="">
                                            <span class="form-required">*</span>
                                            E-MAIL
                                        </label>
                                        <div class="input-wrap">
                                            <input type="text" name="email" :value="(checked)?'{{$user->email}}':''" required>
                                            @error('email')
                                            <span class="form-required">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-2">
                                    <div class="item-wrap">
                                        <label for="">
                                            <span class="form-required">*</span>
                                            LAST NAME
                                        </label>
                                        <div class="input-wrap">
                                            <input class="receiver-name" name="last_name" type="text" :value="(checked)?'{{$user->last_name}}':''" required>
                                            @error('last_name')
                                            <span class="form-required">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-3">
                                    <div class="item-wrap">
                                        <label for="">
                                            <span class="form-required">*</span>
                                            PHONE NUMBER
                                        </label>
                                        <div class="input-wrap">
                                            <input class="receiver-phone" name="mobile" type="text" :value="(checked)?'{{$user->mobile}}':''" required>
                                            @error('mobile')
                                            <span class="form-required">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 order-5">
                                    <div class="item-wrap address-wrap">
                                        <label for="">
                                            <span class="form-required">*</span>
                                            ADDRESS
                                        </label>
                                        <div class="input-wrap">
                                            <div class="address-input">
                                                <input class="receiver-address" name="address" type="text" :value="(checked)?'{{$user->address}}':''" required>
                                            </div>
                                            @error('address')
                                            <span class="form-required">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-7">
                                    <div class="item-wrap">
                                        <label for="">CITY</label>
                                        <div class="input-wrap">
                                            <input name="city" type="text" :value="(checked)?'{{$user->city}}':''">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-8">
                                    <div class="item-wrap">
                                        <label for="">STATE/PROVINCE/REGION</label>
                                        <div class="input-wrap">
                                            <input name="state" type="text" :value="(checked)?'{{$user->state}}':''">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-9">
                                    <div class="item-wrap">
                                        <label for="">ZIP</label>
                                        <div class="input-wrap">
                                            <input name="zip_code" type="text" :value="(checked)?'{{$user->zip_code}}':''">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 order-10">
                                    <div class="item-wrap">
                                        <label for="">COUNTRY</label>
                                        <div class="input-wrap">
                                            <input name="country" type="text" :value="(checked)?'{{$user->country}}':''">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 order-11">
                                    <div class="item-wrap textarea-wrap">
                                        <label for="">NOTE</label>
                                        <div class="input-wrap">
                                            <textarea placeholder="ENTER TEXT" rows="6" name="note"></textarea>
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
                    <button type="submit" >NEXT</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var app = new Vue({
    el: '#shop-cart',
    data: {
        checked:false
    },
    methods: {
        addCount: function (event) {
            var parent = event.currentTarget.parentElement.parentElement.parentElement;
            var product_amount = Number(parent.dataset.product_amount);
            var amount = Number(parent.dataset.amount);
            var price = Number(parent.dataset.price);
            var stop = false

            if (amount < product_amount) {
                parent.getElementsByClassName("spinner")[0].value = amount + 1;
                amount++;
            } else {
                stop = true
            }

            if (!stop) {
                parent.dataset.amount = amount
                // 更新小計& total
                var perItemTotalPrice = parent.nextElementSibling.getElementsByTagName("span")[0];
                var res = (Number(perItemTotalPrice.innerHTML) + price).toFixed(2);
                perItemTotalPrice.innerHTML = res
                $('#total_price span').text( (Number( $('#total_price span').text() ) + price).toFixed(2) )
            }

        },
        minusCount: function (event) {
            var parent = event.currentTarget.parentElement.parentElement.parentElement;
            var product_amount = Number(parent.dataset.product_amount);
            var amount = Number(parent.dataset.amount);
            var price = Number(parent.dataset.price);
            var stop = false

            if (amount > 0) {
                parent.getElementsByClassName("spinner")[0].value = amount - 1;
                amount--;
                parent.dataset.amount = amount
                // 更新小計& total
                var perItemTotalPrice = parent.nextElementSibling.getElementsByTagName("span")[0];
                var res = (Number(perItemTotalPrice.innerHTML) - price).toFixed(2);
                perItemTotalPrice.innerHTML = res
                $('#total_price span').text( (Number( $('#total_price span').text() ) - price).toFixed(2) )
            }
        },
        drop: function (event) {
            event = event ? event : (window.event ? window.event : "")
            event.preventDefault();
            var yes = confirm("Confirm Delete?");
            if (yes) {
                var target = event.currentTarget;
                var pdNum = target.parentElement.parentElement.previousElementSibling.previousElementSibling
                var amount = Number(pdNum.dataset.amount)
                var price = Number(pdNum.dataset.price)
                axios.post('/dropToCart', {
                    id: target.dataset.id
                })
                    .then(function (response) {
                        target.parentElement.parentElement.parentElement.style.display = "none";
                        // 更新total
                        $('#total_price span').text( (Number($('#total_price span').text()) - (amount * price)).toFixed(2) )
                        // 更新navbar購物車數字
                        $('.shop-num').each(function () {
                            $(this).text(Number($(this).text()) - 1);
                        })
                    })
                    .catch(function (error) {
                    });
            } else {
                //
            }
        },

    },
})
</script>
@endsection
