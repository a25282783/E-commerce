@extends('layouts.app')
@section('content')
<section id="product-inner">
    <div class="container pt-5">
    {{-- 提示 --}}
    @if (session('status'))
    <div class="d-block" id="addToCartAlert">
        <div class="mb-4 mb-lg-5 alert {{session('status')=='1'?'alert-success':'alert-danger'}}" role="alert">
          <div class="d-flex align-items-center pr-3">
            <svg class="svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3">
              <use xlink:href="#checked-circle-1"> </use>
            </svg>
            <p class="mb-0">{{session('status')=='1'?'成功加入購物車':'庫存不足'}}
                @if (session('status')=='1')
                <br class="d-inline-block d-lg-none">
                <a href="/cart" class="text-reset text-decoration-underline ml-lg-3">查看購物車</a>
                @endif
            </p>
          </div>
          <button class="close close-absolute close-centered opacity-10 text-inherit" type="button" data-dismiss="alert" aria-label="Close">
            <svg class="svg-icon w-2rem h-2rem">
              <use xlink:href="#close-1"> </use>
            </svg>
          </button>
        </div>
      </div>
    @endif
      {{-- 提示end --}}
      <ul class="breadcrumb undefined">
        <li class="breadcrumb-item"><a href="/">所有商家</a></li>
        {{-- <li class="breadcrumb-item"><a href="category-full.html">類別</a></li> --}}
        <li class="breadcrumb-item active">
            {{ $data->name }}
        </li>
      </ul>
      <div class="row">
        <div class="col-lg-7 order-2 order-lg-1">
          <div class="detail-carousel">
            <div class="swiper-container detail-slider photoswipe-gallery" id="detailSlider">
              <!-- Additional required wrapper-->
              <div class="swiper-wrapper">
                <!-- Slides-->
                @foreach ($data->img as $img)
                <div class="swiper-slide">
                    <a class="btn btn-photoswipe" href="{{$img}}" data-caption="{{$img}}" data-toggle="photoswipe" data-width="1200" data-height="1200">
                        <svg class="svg-icon svg-icon-heavy">
                        <use xlink:href="#expand-1"> </use>
                        </svg>
                    </a>
                    <div data-toggle="zoom" data-image="{{$img}}">
                        <img class="img-fluid" src="{{$img}}" alt="{{$data->name}}">
                    </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="swiper-thumbs" data-swiper="#detailSlider">
            @foreach ($data->img as $img)
            <button class="swiper-thumb-item detail-thumb-item mb-3">
                <img class="img-fluid" src="{{$img}}" alt="{{$data->name}}">
            </button>
            @endforeach
          </div>
        </div>
        <div class="col-lg-5 pl-lg-4 order-1 order-lg-2">
          <h1 class="mb-4">{{$data->name}}</h1>
          <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
            <ul class="list-inline mb-2 mb-sm-0">
              <li class="list-inline-item h4 font-weight-light mb-0">${{$data->price}}</li>
              {{-- <li class="list-inline-item text-muted font-weight-light">
                <del>${{$data->price}}</del>
              </li> --}}
            </ul>
          </div>
          <p class="mb-4 text-muted">商品介紹</p>
          <form id="buyForm" action="/addToCart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$data->id}}" readonly>
            <div class="row">
                {{-- 可選項 --}}
                {{-- color --}}
                @if (is_array($data->color) && !empty($data->color) )
                <div class="col-sm-6 col-lg-12 detail-option mb-5">
                    <h6 class="detail-option-heading">顏色 <span>(必填)</span></h6>
                    @foreach ($data->color as $colorOption)
                    <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="color_{{$colorOption}}"> {{$colorOption}}
                        <input type="radio" name="color" value="{{$colorOption}}" class="input-invisible" id="color_{{$colorOption}}" required>
                    </label>
                    @endforeach
                </div>
                @endif
               {{-- size --}}
                @if (is_array($data->size) && !empty($data->size) )
                <div class="col-sm-6 col-lg-12 detail-option mb-4">
                    <h6 class="detail-option-heading">尺寸 <span>(必填)</span></h6>
                    <select name="size" class="selectpicker" data-style="btn-selectpicker">
                    @foreach ($data->size as $sizeOption)
                    <option value="{{$sizeOption}}">{{$sizeOption}}</option>
                    @endforeach
                    </select>
                </div>
                @endif
                {{-- pack --}}
                @if (is_array($data->pack) && !empty($data->pack) )
                <div class="col-sm-6 col-lg-12 detail-option mb-5">
                    <h6 class="detail-option-heading">裝訂方式 <span>(必填)</span></h6>
                    @foreach ($data->pack as $packOption)
                    <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="pack{{$packOption}}"> {{$packOption}}
                        <input type="radio" name="pack" value="{{$packOption}}" class="input-invisible"  id="pack{{$packOption}}" required>
                    </label>
                    @endforeach
                </div>
                @endif
              {{-- 可選項end --}}
            </div>
            @auth
            @if (auth()->user()->email_verified_at)
            <div class="input-group w-100 mb-4">
                <input name="amount" type="number" value="1" min="1" max="5" class="form-control form-control-lg detail-quantity">
                <div class="input-group-append flex-grow-1">
                  <button class="btn btn-dark btn-block" type="submit"> <i class="fa fa-shopping-cart mr-2"></i>加入購物車</button>
                </div>
              </div>
            @else
            <div class="input-group w-100 mb-4">
                <div class="input-group-append flex-grow-1">
                  <button class="btn btn-dark btn-block" type="button" onclick="location.href ='/profile';"> <i class="fa fa-shopping-cart mr-2"></i>請先驗證信箱</button>
                </div>
              </div>
            @endif
            @endauth
            @guest
            <div class="input-group w-100 mb-4">
                <div class="input-group-append flex-grow-1">
                  <button class="btn btn-dark btn-block" type="button" onclick="location.href ='/login';"> <i class="fa fa-shopping-cart mr-2"></i>請先登入</button>
                </div>
              </div>
            @endguest
            <div class="row mb-4">
            </div>
            <ul class="list-unstyled">
                <li><strong>類別:</strong>
                    <a class="text-muted" href="#">{{ $data->category->name }}</a>
                </li>
            </ul>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section class="mt-5">
    <div class="container">
      <ul class="nav nav-tabs flex-column flex-sm-row" role="tablist">
        <li class="nav-item"><a class="nav-link detail-nav-link active" data-toggle="tab" href="#description" role="tab">產品介紹</a></li>
        <li class="nav-item"><a class="nav-link detail-nav-link" data-toggle="tab" href="#additional-information" role="tab">商品規格</a></li>
        <li class="nav-item"><a class="nav-link detail-nav-link" data-toggle="tab" href="#reviews" role="tab">運送及退換貨政策</a></li>
      </ul>
      <div class="tab-content py-4">
        <div class="tab-pane fade show active px-3" id="description" role="tabpanel">
          <div class="row">
            <div class="col-md-7">
              <h5>關於</h5>
              <p class="text-muted">
                  {!! $data->intro !!}
              </p>
              <h5>你會喜歡</h5>
              <ul class="text-muted">
                <li>牛仔褲推薦</li>
                <li>牛仔褲推薦</li>
                <li>牛仔褲推薦</li>
              </ul>
            </div>
            <div class="col-md-5"><img class="img-fluid" src="img/product/detail-3.jpg" alt=""></div>
          </div>
        </div>
        <div class="fade tab-pane" id="additional-information" role="tabpanel">
          <div class="row">
            <div class="col-lg-12">
              <table class="table text-sm">
                <tbody>
                  <tr>
                    <th class="font-weight-normal border-0">商品名稱</th>
                    <td class="text-muted border-0">{{$data->name}}</td>
                  </tr>
                  <tr>
                    <th class="font-weight-normal ">商品尺寸</th>
                    <td class="text-muted ">{{$data->spec}}</td>
                  </tr>
                  <tr>
                    <th class="font-weight-normal ">商品重量</th>
                    <td class="text-muted ">{{$data->weight}}</td>
                  </tr>
                  <tr>
                    <th class="font-weight-normal ">產地</th>
                    <td class="text-muted ">{{$data->place}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel">
          <div class="row">
            <div class="col-md-7">
              <h5>運送方式</h5>
              <p class="text-muted">
                {!! $data->ship_way !!}
              </p>
              <h5>退換貨政策</h5>
              <p class="text-muted">
                {!! $data->refund_way !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/product.js?v=20210324"></script>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!--
    Background of PhotoSwipe.
    It's a separate element as animating opacity is faster than rgba().
    -->
    <div class="pswp__bg"></div>
    <!-- Slides wrapper with overflow:hidden.-->
    <div class="pswp__scroll-wrap">
      <!--
      Container that holds slides.
      PhotoSwipe keeps only 3 of them in the DOM to save memory.
      Don't modify these 3 pswp__item elements, data is added later on.
      -->
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <!-- Controls are self-explanatory. Order can be changed.-->
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
          <!-- element will get class pswp__preloader--active when preloader is running-->
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center text-center"></div>
        </div>
      </div>
    </div>
  </div>
@endpush
