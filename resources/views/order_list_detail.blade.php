@extends('layouts.app')
@section('content')
<section id="order" class="top-bottom-empty">
    <!-- <div class="main-title-bottom"> -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>ORDER</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>
                            <span>ORDER</span>
                            <span>2017123107361041</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="status">
                        <span>Status:</span>
                        <span>Completed</span>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="date">
                        <span>Date:</span>
                        <span>2020-01-31</span>
                    </div>
                </div>
            </div>
            <div class="list-title">
                <div class="row">
                    <div class="col-4">Product</div>
                    <div class="col-3">Price</div>
                    <div class="col-3">Quantity</div>
                    <div class="col-2">Subtotal</div>
                </div>
            </div>
            @foreach ($order->cart_info as $item)
            <div class="list-wrap">
                <div class="list">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <span class="item-title">Product&nbsp</span>
                            <span>{{ App\Product::find($item['product_id'])->name }}</span>
                        </div>
                        <div class="col-12 col-lg-3">
                            <span class="item-title">Price&nbsp</span>
                            <span>US${{ $item['per_price'] }}</span>
                        </div>
                        <div class="col-12 col-lg-3">
                            <span class="item-title">Quantity&nbsp</span>
                            <span>{{ $item['amount'] }}</span>
                        </div>
                        <div class="col-12 col-lg-2">
                            <span class="item-title">Subtotal&nbsp</span>
                            <span>US${{ $item['total_price'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="total-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="total">
                                <div class="total-list">
                                    <div class="item">
                                        <span>Total</span>
                                        <span>US${{ $order->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="list-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="text-wrap">
                            <div class="bt-title">RECIPIENT</div>
                            <div class="item-wrap"><span>FIRST NAME：</span>
                                <span>{{ $receipt['first_name'] }}</span>
                            </div>
                            <div class="item-wrap"><span>LAST NAME：</span>
                                <span>{{ $receipt['last_name'] }}</span>
                            </div>
                            <div class="item-wrap"><span>PHONE NUMBER：</span>
                                <span>{{ $receipt['mobile'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="text-wrap">
                            <div class="bt-title">PAYMENT INFORMATION</div>
                            <div class="item-wrap">
                                <span>PAYMENT METHOD :</span>
                                <span>PayPal</span>
                            </div>
                            <div class="item-wrap"><span>PAYMENT STATUS :</span><span>Unpaid</span></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-wrap">
                            <div class="bt-title">DELIVERY INFORMATION</div>
                            <div class="item-wrap">
                                <span>ADDRESS:</span>
                                <span>{{ $receipt['address'] }}</span>
                            </div>
                            <div class="item-wrap"><span>CITY:</span>
                                <span>{{ $receipt['city'] }}</span>
                            </div>
                            <div class="item-wrap"><span>STATE/PROVINCE/REGION:</span>
                                <span>{{ $receipt['state'] }}</span>
                            </div>
                            <div class="item-wrap"><span>ZIP:</span>
                                <span>{{ $receipt['zip_code'] }}</span>
                            </div>
                            <div class="item-wrap"><span>COUNTRY:</span>
                                <span>{{ $receipt['country'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="prev-btn">
                            <a href="/order/list"><button>BACK</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
