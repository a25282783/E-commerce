@extends('layouts.app')
@section('content')
<section id="order-list" class="top-bottom-empty">
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
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>ORDER</div>
                    </div>
                </div>
            </div>
            <div class="list-title">
                <div class="row">
                    <div class="col-3">Order number</div>
                    <div class="col-2">Date</div>
                    <div class="col-2">Price</div>
                    <div class="col-2">Status</div>
                    <div class="col-3"></div>
                </div>
            </div>
            @foreach ($data as $item)
            <div class="list-wrap">
                <div class="list">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <span class="item-title">Order number&nbsp</span>
                            <span>{{ $item->order_id }}</span>
                        </div>
                        <div class="col-12 col-lg-2">
                            <span class="item-title">Date&nbsp</span><span>{{ date("Y-m-d",strtotime($item->created_at)) }}</span>
                        </div>
                        <div class="col-12 col-lg-2">
                            <span class="item-title">Price&nbsp</span><span>US${{ $item->price }}</span>
                        </div>
                        <div class="col-12 col-lg-3">
                            <span class="item-title">Status&nbsp</span><span>{{ config('app.orderStatus_en')[$item->status] }}</span>
                        </div>
                        <div class="col-12 col-lg-2">
                            <a href="/order/list/{{$item->id}}">
                                <button>Detail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $data->links() }}
    </div>
</section>
@endsection
