@extends('layouts.app')
@section('content')
<div class="container-fluid leave-top" style="overflow: hidden;">
    <!-- bannerSlick -->
    <div class="row indexBn-box">
        <ul class='indexBn-slick'>
           @php
            $banner = App\Banner::all();
           @endphp
           @foreach ($banner as $item)
            <li class='bn' >
                <div class="bg-wrap" style="background-image: url(/uploads/{{ $item->banner }})"></div>
                <div class="container-fluid text-container">
                    <div class="row bn-row">
                        <div class="bn-text1">
                            <h2 class='white bold'>{{ $item->title }}</h2>
                            <p class='white'>{{ $item->sub_title }}</p>
                        </div>
                    </div>
                </div>
            </li>
           @endforeach
        </ul>
        <div class="arrow-control">
            <a href="" class='left'><img src="/img/svg/banner_arrow_l.svg" alt=""></a>
            <a href="" class='right'><img src="/img/svg/banner_arrow_r.svg" alt=""></a>
        </div>
    </div>

    <!-- slick1 -->
    <div class="row mb60">
        <div class="container">
            <div class="row">
                <div class="w-100">
                    <h2 class='text-center openSans-font font30'>New Products</h2>
                </div>
            </div>
            <div class="index-p1-out">
                <div class="row index-p1">
                    @php
                        $new_product = App\Product::orderBy('id','desc')->limit(6)->get();
                    @endphp
                    @foreach ($new_product  as $product)
                    <div class="col-6 col-md-4 ">
                        <div class="ip-box">
                            <a href="/product/{{ $product->id }}">
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
                            <h4 class='ip-name'>{{ Str::limit($product->name,30) }}</h4>
                            <div class="ip-price-wrap">
                                @if ($product->detail['sale'])
                                <STRIKE class='ip-price'>
                                    Price:US${{ $product->detail['price'] }}
                                </STRIKE>
                                <span class='ip-price-onsale'>
                                    Sale:US${{ $product->detail['sale'] }}
                                </span>
                                @else
                                <span class='ip-price'>
                                    Price:US${{ $product->detail['price'] }}
                                </span>
                                <span class='ip-price-onsale'>&nbsp;</span>
                                @endif
                            </div>
                            <a href="/product/{{ $product->id }}" class='ip-cart'>
                                Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="index-control ic1">
                    <a class="left">
                        <svg version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 42 24" style="enable-background:new 0 0 42 24;" xml:space="preserve">

                        <path d="M0,12l12,12h6L6,12L18,0l-6,0L0,12z M12,12l12,12h6L18,12L30,0l-6,0L12,12z M24,12l12,12h6L30,12L42,0l-6,0
                            L24,12z"/>
                        </svg>
                    </a>
                    <a class="right">
                        <svg version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 42 24" style="enable-background:new 0 0 42 24;" xml:space="preserve">
                        <path d="M30,0h-6l12,12L24,24h6l12-12L30,0z M18,0h-6l12,12L12,24h6l12-12L18,0z M6,0H0l12,12L0,24h6l12-12L6,0z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <!-- see more start -->
            <div class="row">
                <div class="col-12">
                    <a href='/product/all' class='seemore'>
                        <svg version="1.1" id="圖層_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 19 19" style="enable-background:new 0 0 19 19;" xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:#231815;}
                            <!-- .st0{fill:#ffffff;} -->
                            .st1{fill:#FFFFFF;}
                        </style>
                        <g>
                            <circle class="st0" cx="9.5" cy="9.5" r="9.5"/>
                            <path class="st1" d="M15.7,10.7l-5,5c-0.6,0.6-1.7,0.6-2.4,0c-0.6-0.6-0.6-1.7,0-2.3c0.3-0.3,2.1-2.2,2.1-2.2h-6
                                c-0.9,0-1.7-0.7-1.7-1.7s0.7-1.7,1.7-1.7h6c0,0-1.8-1.8-2.1-2.1C7.7,5,7.7,4,8.3,3.3s1.7-0.6,2.4,0l5,5C16.3,9,16.3,10,15.7,10.7z"
                                />
                        </g>
                        </svg>
                        SEE MORE
                    </a>
                </div>
            </div>
            <!-- see more end -->
        </div>
    </div>

    <!-- banner2 -->
    @php
    $footer = App\Footer::first();
    @endphp
    @if ($footer)
    <div class="row index-bn2 banner3" onclick="window.location.href='{{ $footer->mid_url }}'" >
        <div class="bg-wrap" style="background-image: url('/uploads/{{ $footer->mid_banner }}')">
        </div>
    </div>
    <!-- banner3 -->
    <div class="row index-bn2 d-flex align-items-center" style="background-image: url('/img/png/video_bg.jpg')">
        <div class="container" style="position: relative;">
            <div class="row d-flex align-items-center" style="margin: 20px;">

                <div class="col-12 col-lg-6 push-lg-6 bn3-box">
                    <div>
                        <h2 class='white bold'>{{ $footer->mid_title }}</h2>
                        <p class='white'>{!! nl2br($footer->mid_text) !!}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 pull-lg-6">
                    <div class="row">
                        <div class="embed-responsive embed-responsive-16by9">
                           {!! $footer->mid_video !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif

    <!-- Au product -->
    <div class="row ptb50">
        <div class="container">
            <div class="row">
                <div class="w-100">
                    <h2 class='text-center openSans-font font30'>All Products</h2>
                </div>
            </div>
            <div class="index-p3-out">
                @php
                $all_product = App\Product::orderBy('id','asc')->limit(12)->get();
                @endphp
                @foreach ($all_product as $product)
                @if ($loop->index%4==0)
                <div class="index-p1">
                    <div class="row">
                @endif
                    <div class="col-6 col-md-3" >
                        <div class="ip-box">
                            <a href="/product/{{ $product->id }}">
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
                            <h4 class='ip-name'>{{ Str::limit($product->name,30) }}</h4>
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
                @if ($loop->index%4==3 || $loop->last)
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <a href='/product/all' class='seemore'>
                        <svg version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 19 19" style="enable-background:new 0 0 19 19;" xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:#231815;}
                            <!-- .st0{fill:#FFFFFF;} -->
                            .st1{fill:#FFFFFF;}
                        </style>
                        <g>
                            <circle class="st0" cx="9.5" cy="9.5" r="9.5"/>
                            <path class="st1" d="M15.7,10.7l-5,5c-0.6,0.6-1.7,0.6-2.4,0c-0.6-0.6-0.6-1.7,0-2.3c0.3-0.3,2.1-2.2,2.1-2.2h-6
                                c-0.9,0-1.7-0.7-1.7-1.7s0.7-1.7,1.7-1.7h6c0,0-1.8-1.8-2.1-2.1C7.7,5,7.7,4,8.3,3.3s1.7-0.6,2.4,0l5,5C16.3,9,16.3,10,15.7,10.7z"
                                />
                        </g>
                        </svg>
                        SEE MORE
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- slick3 -->
    <div class="row index-adslide">
        <div class='index-adslide-ul'>
            @php
                $news = App\News::all();
            @endphp
            @foreach ($news as $item)
            <div class="parent">
                <a href="/news/show/{{$item->id}}">
                    <div class="child">
                        <img src="/uploads/{{ $item->prev_img }}" class="img-rwd">
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="index-control">
            <a class="left">
                <svg version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 42 24" style="enable-background:new 0 0 42 24;" xml:space="preserve">

                <path d="M0,12l12,12h6L6,12L18,0l-6,0L0,12z M12,12l12,12h6L18,12L30,0l-6,0L12,12z M24,12l12,12h6L30,12L42,0l-6,0
                    L24,12z"/>
                </svg>
            </a>
            <a class="right">
                <svg version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 42 24" style="enable-background:new 0 0 42 24;" xml:space="preserve">
                <path d="M30,0h-6l12,12L24,24h6l12-12L30,0z M18,0h-6l12,12L12,24h6l12-12L18,0z M6,0H0l12,12L0,24h6l12-12L6,0z"/>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
