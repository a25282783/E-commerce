@extends('layouts.app')
@section('content')
<section id="footer-terms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <h1 class="main-title">
                        @switch(request()->route('theme') )
                        @case('payment')
                            Payment Method
                            @break
                        @case('shipping')
                            Shipping Method
                            @break
                        @case('return')
                            Return and exchange methods
                            @break
                        @case('service')
                            Terms Of Service
                            @break
                        @case('privacy')
                            Privacy Policy
                            @break
                    @endswitch
                    </h1>
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>Features</div>
                    </div>
                    <div class="content">
                        @switch(request()->route('theme') )
                            @case('payment')
                                {!! $data->payment !!}
                                @break
                            @case('shipping')
                                {!! $data->shipping !!}
                                @break
                            @case('return')
                                {!! $data->return !!}
                                @break
                            @case('service')
                                {!! $data->service !!}
                                @break
                            @case('privacy')
                                {!! $data->privacy !!}
                                @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="leaf-img">
	<img src="/img/footer-terms/leaf.png" alt="">
</div>
@endsection
