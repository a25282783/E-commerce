@extends('layouts.app')
@section('content')
<section class="all-product-assemble">
    <div class="container">
        <div class="row ptb50">
            <div class="container">
                <div class="row">
                    <div class="w-100">
                        <h2 class='text-center openSans-font font40'>
                            <div class="en">{{ $name }}</div>
                            <div class="cn"></div>
                        </h2>
                    </div>
                </div>
                <div class="index-p3-out">
                    @foreach ($data as $product)
                        @if ($loop->index%4==0)
                        <div class="index-p1">
                            <div class="row">
                        @endif
                            <div class="col-6 col-md-3" >
                                <div class="ip-box">
                                    <a href="/product/{{ $product->id }}">
                                        <figure>
                                            <img src="/uploads/{{ $product->prev_img }}" class='img-rwd'>

                                        </figure>
                                    </a>
                                    <h4 class='ip-name'>{{ Str::limit($product->name,30) }}</h4>
                                    <div class="ip-price-wrap-m ">
                                        <p class='ip-price-onsale'>
                                            Sale:US${{ $product->price }}
                                        </p>
                                    </div>
                                    <a href="/product/{{ $product->id }}" class='ip-cart'>
                                        Detail
                                    </a>
                                </div>
                            </div>
                        @if ($loop->index%4==3)
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                {{ $data->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
