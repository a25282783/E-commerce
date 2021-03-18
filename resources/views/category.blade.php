@extends('layouts.app')
@section('content')
<section class="all-product-assemble">
    <div class="container">
        <div class="row ptb50">
            <div class="container">
                <div class="row">
                    <div class="w-100">
                        <h2 class='text-center openSans-font font40'>
                            <div class="en">Daemon III</div>
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
                                    <a href="product-inner.php">
                                        <figure>
                                            <img src="/uploads/{{ $product->prev_img }}" class='img-rwd'>
                                            @if ($product->detail['sale'])
                                            <figcaption>
                                                <p>TIME<br>LIMIT</p>
                                                <span></span>
                                            </figcaption>
                                            @endif
                                        </figure>
                                    </a>
                                    <h4 class='ip-name'>{{ $product->name }}</h4>
                                    <div class="ip-price-wrap-m ">
                                        @if ($product->detail['sale'])
                                        <STRIKE class='ip-price'>
                                            Price:US${{ $product->detail['price'] }}
                                        </STRIKE>
                                        <p class='ip-price-onsale'>
                                            Sale:US${{ $product->detail['sale'] }}
                                        </p>
                                        @else
                                        <p class='ip-price'>
                                            Price:US${{ $product->detail['price'] }}
                                        </p>
                                        <p class='ip-price-onsale'>&nbsp;</p>
                                        @endif

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
