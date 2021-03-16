@extends('layouts.app')
@section('content')
<style>
    .select-wrap:after{
        content: none !important;
    }
    .select-wrap > input{
        width:100% !important;
        width: -moz-available;
        width: -webkit-fill-available;
        width: fill-available;
    }
</style>
<section id="product-inner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="product-img">
                    <div class="img-wrap">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="img-slider-wrap">
                    <div class="slider img-slider">
                        @if (is_array($data->img))
                        @foreach ($data->img as $item)
                            <li>
                                <div class="img-wrap">
                                    <img src="/uploads/{{ $item }}" alt="product image">
                                </div>
                            </li>
                        @endforeach
                        @else
                            <p>No images</p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <div class="product-title">
                            <div class="main-title">
                                {{ $data->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <div class="row">
                        <div class="col-12">
                            <p>
                                {{ $data->intro }}
                            </p>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="product-form-wrap">
                    <div class="row">
                        <div class="col-12 item-feature-wrap">
                            <div class="item item-feature">
                                <label for="">Diameter:</label>
                                <span>{{ $data->detail['diameter'] }}</span>
                            </div>
                            <div class="item item-feature">
                                <label for="">Thickness:</label>
                                <span>{{ $data->detail['thickness'] }}</span>
                            </div>
                            <div class="item item-feature">
                                <label for="">Bezel Type: </label>
                                <span>{{ $data->detail['bezel'] }}</span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8">
                            <div class="item">
                                <label for="">Price:</label>
                                <span>US.${{ $data->detail['price'] }}</span>
                            </div>
                            <div class="item">
                                <label for="">Sale:</label>
                                @if ($data->detail['sale'])
                                <span>US.${{ $data->detail['sale'] }}</span>
                                @endif
                            </div>
                            <div class="item">
                                <label for="">Quantity:</label>
                                <div class="select-wrap">
                                    <input type="number" v-model="count">
                                </div>
                            </div>
                        </div>
                        {{-- auth --}}
                        @auth
                        @if (auth()->user()->email_verified_at)
                            @if ($data->amount>0)
                            <div class="col-12 col-lg-4">
                                <div class="add-to-cart">
                                    <input type="submit" value="ADD CART" @click="addToCart">
                                    <input type="hidden" ref="product_id" value="{{ $data->id }}">
                                </div>
                            </div>
                            @else
                            <div class="col-12 col-lg-4">
                                <div class="add-to-cart">
                                    <input type="submit" value="No Inventory">
                                </div>
                            </div>
                            @endif
                        @else
                        <div class="col-12 col-lg-4">
                            <div class="add-to-cart">
                                <form method="POST" action="{{ route('verification.resend') }}" style="width: 100%">
                                @csrf
                                <input type="submit" value="Verify Email" >
                                </form>
                            </div>
                        </div>
                        @endif
                        @endauth
                        {{-- guest --}}
                        @guest
                        <div class="col-12 col-lg-4">
                            <div class="add-to-cart">
                                <input type="submit" value="Log in" onclick="location.href ='/login';">
                            </div>
                        </div>
                        @endguest
                        {{-- cart info  --}}
                        <div class="col-12 col-lg-12">
                            <div class="item">
                                <img src="/img/loading.gif" alt="loading" class="icon" style="width: 2rem;height: 100%;" v-show="is_loading">
                                <span v-show="is_loading" >Sending... </span>
                                <span v-show="callback" class="d-block">@{{callback_msg}}</span>
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
                <div class="product-banner">
                    @isset($item->banner)
                    <img src="/uploads/{{ $item->banner }}" alt="">
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="item-wrap">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="title green-decor-title">
                                <div class="decor-squ"></div>
                                <div>Features</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="intro-text">
                               {!! $data->feature !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="item-wrap">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="title green-decor-title">
                                <div class="decor-squ"></div>
                                <div>Package</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="intro-text">
                                {!! $data->package !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="item-wrap">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="title green-decor-title">
                                <div class="decor-squ"></div>
                                <div>Exterior</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="intro-text">
                                {!! $data->exterior !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/product.js"></script>
@endsection
