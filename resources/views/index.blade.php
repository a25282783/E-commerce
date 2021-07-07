@extends('layouts.app')
@section('content')
<svg class="svg-blob svg-blob-fill-current" style=" width: 800px; height: 800px; max-width: 100%; left: -200px; top: -200px; color: #e0d4ab;">
    <use xlink:href="#blob-shape"> </use>
</svg>
   <!-- Slider main container-->
   <div class="swiper-container home-slider-design" style="height: 50vh; min-height: 500px;">
    <!-- Additional required wrapper-->
    <div class="swiper-wrapper">
      <!-- Slides-->
      @foreach ($banner as $item)
      <div class="swiper-slide">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-sm-6 pt-5 pt-md-0" data-swiper-parallax="-500">
                <p class="subtitle letter-spacing-3 mb-3 text-dark font-weight-light">
                  {{ $item->sub_title }}
                </p>
                <h2 class="display-3 mb-5" style="line-height: 1">
                    {{ $item->title }}
                </h2>
                <a class="btn btn-outline-primary" href="{{ $item->url }}">查看更多</a>
            </div>
            <div class="col-sm-6 text-center">
                <img class="img-fluid home-slider-image" src="{{ $item->banner }}" alt="" style="max-height: 500px" data-swiper-parallax="-200">
                <svg class="svg-blob d-none d-md-inline-block svg-blob-fill-current svg-blob-swiper" style="color: #ffdddd">
                    <use xlink:href="#blob-shape-3"> </use>
                </svg>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-nav d-none d-lg-block">
      <div class="swiper-button-prev" id="homePrev"></div>
      <div class="swiper-button-next" id="homeNext">   </div>
    </div>
  </div>
      <!-- Top choices -->
      <section class="py-6">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 mb-5">
              <p class="text-uppercase text-muted font-weight-bold mb-1">Top choices</p>
              <h3>精選商品</h3>
              <p class="lead text-muted">精選商品介紹 </p>
            </div>
          </div>

          <div class="row">
            @foreach ($new_product  as $product)
            <div class="col-md-4 mb-4 mb-lg-6 pt-md-3 hover-scale">
                <a href="/product/{{ $product->id }}">
                    <img class="img-fluid" src="{{ $product->prev_img }}" alt="">
                </a>
                <div class="px-4 position-relative z-index-2 mt--3">
                <a class="text-dark text-decoration-none" href="/product/{{ $product->id }}">
                    <h3>{{ nl2br($product->name,30) }}
                    </h3>
                    <p class="text-muted">
                        ${{ $product->price }}
                    </p>
                </a>
                <p>
                    <a class="btn btn-link text-dark text-decoration-none px-0" href="/product/{{ $product->id }}">
                    商品內容
                    </a>
                </p>
                </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!--End of Top choices -->
    <!-- All Product -->
    <div class="position-relative py-1">
        <svg class="svg-blob svg-blob-fill-current d-none d-md-block" style="right: -200px; top: 400px; color: #f7efcb;">
          <use xlink:href="#blob-shape-2"> </use>
        </svg>
        <div class="container">
          <h2 id="all_product">所有商品</h2>
          <p class="lead text-muted mb-5">
              @if ($config && $config->all_product_intro)
                  {!! nl2br($config->all_product_intro) !!}
              @endif
          </p>
          <div class="row justify-content-between align-items-center mb-4">
            <div class="col-12 col-md">
              <ul class="list-inline mb-3 mb-md-0">
                <li class="list-inline-item"><a class="{{$tagClassAll}}" href="/index.php#all_product">所有商品 </a></li>
                @foreach ($all_category as $item)
                <li class="list-inline-item"><a class="{{$item->tagClass}}" href="index.php?cate={{$item->id}}#all_product">{{$item->name}}</a></li>
                @endforeach
              </ul>
            </div>
            {{-- <div class="col-12 col-md-auto"><a class="btn btn-link px-0" href="#">所有商品</a></div> --}}
          </div>
          <div class="row">
            <!-- product-->
            @foreach ($all_product as $product)
            <div class="col-xl-3 col-md-4 col-6">
              <div class="product" data-aos="zoom-in" data-aos-delay="0">
                <div class="product-image mb-md-3">
                  {{-- <div class="product-badge badge badge-secondary">新品</div> --}}
                    <a href="/product/{{ $product->id }}">
                        <div class="product-swap-image">
                            <img class="img-fluid product-swap-image-front" src="{{ $product->prev_img }}" alt="product"/>
                            <img class="img-fluid" src="{{ $product->prev_img }}" alt="product"/>
                        </div>
                    </a>
                  <div class="product-hover-overlay">
                    <a class="text-dark text-sm" href="/product/{{ $product->id }}">
                      <svg class="svg-icon text-hover-primary svg-icon-heavy d-sm-none">
                        <use xlink:href="#retail-bag-1"> </use>
                      </svg><span class="d-none d-sm-inline">查看內容</span>
                    </a>
                  </div>
                </div>
                <div class="position-relative">
                    <h3 class="text-base mb-1">
                        <a class="text-dark" href="/product/{{ $product->id }}">
                            {{ Str::limit($product->name,30) }}
                        </a>
                    </h3>
                    <span class="text-gray-500 text-sm">
                        ${{ $product->price }}
                    </span>
                  <div class="product-stars text-xs"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-muted"></i><i class="fa fa-star text-muted"></i></div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- /product   -->
          </div>
          <!-- Quickview Modal    -->
          <div class="modal fade quickview" id="quickView" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <button class="close close-absolute close-rotate" type="button" data-dismiss="modal" aria-label="Close">
                  <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
                    <use xlink:href="#close-1"> </use>
                  </svg>
                </button>
                <div class="modal-body quickview-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="detail-carousel">
                        <div class="product-badge badge badge-primary">Fresh</div>
                        <div class="product-badge badge badge-dark">Sale</div>
                        <div class="swiper-container quickview-slider" id="quickViewSlider">
                          <!-- Additional required wrapper-->
                          <div class="swiper-wrapper">
                            <!-- Slides-->
                            <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-1-gray.jpg" alt="Modern Jacket 1"></div>
                            <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-2-gray.jpg" alt="Modern Jacket 2"></div>
                            <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-3-gray.jpg" alt="Modern Jacket 3"></div>
                            <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-4-gray.jpg" alt="Modern Jacket 4"></div>
                            <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-5-gray.jpg" alt="Modern Jacket 5"></div>
                          </div>
                        </div>
                        <div class="swiper-thumbs" data-swiper="#quickViewSlider">
                          <button class="swiper-thumb-item detail-thumb-item mb-3 active"><img class="img-fluid" src="img/product/detail-1-gray.jpg" alt="Modern Jacket 0"></button>
                          <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-2-gray.jpg" alt="Modern Jacket 1"></button>
                          <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-3-gray.jpg" alt="Modern Jacket 2"></button>
                          <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-4-gray.jpg" alt="Modern Jacket 3"></button>
                          <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-5-gray.jpg" alt="Modern Jacket 4"></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 p-lg-5">
                      <h2 class="mb-4 mt-4 mt-lg-1">Push-up Jeans</h2>
                      <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
                        <ul class="list-inline mb-2 mb-sm-0">
                          <li class="list-inline-item h4 font-weight-light mb-0">$65.00</li>
                          <li class="list-inline-item text-muted font-weight-light">
                            <del>$90.00</del>
                          </li>
                        </ul>
                        <div class="d-flex align-items-center text-sm">
                          <ul class="list-inline mr-2 mb-0">
                            <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                            <li class="list-inline-item mr-0"><i class="fa fa-star text-gray-300"></i></li>
                          </ul><span class="text-muted text-uppercase">25 reviews</span>
                        </div>
                      </div>
                      <p class="mb-4 text-muted">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                      <form id="buyForm_modal" action="#">
                        <div class="row">
                          <div class="col-sm-6 col-lg-12 detail-option mb-4">
                            <h6 class="detail-option-heading">Size <span>(required)</span></h6>
                            <select class="selectpicker" name="size" data-style="btn-selectpicker">
                              <option value="value_0">Small</option>
                              <option value="value_1">Medium</option>
                              <option value="value_2">Large</option>
                            </select>
                          </div>
                          <div class="col-sm-6 col-lg-12 detail-option mb-5">
                            <h6 class="detail-option-heading">Type <span>(required)</span></h6>
                            <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="material_0_modal"> Hoodie
                              <input class="input-invisible" type="radio" name="material" value="value_0" id="material_0_modal" required>
                            </label>
                            <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="material_1_modal"> College
                              <input class="input-invisible" type="radio" name="material" value="value_1" id="material_1_modal" required>
                            </label>
                          </div>
                        </div>
                        <div class="input-group w-100 mb-4">
                          <input class="form-control form-control-lg detail-quantity" name="items" type="number" value="1">
                          <div class="input-group-append flex-grow-1">
                            <button class="btn btn-dark btn-block" type="submit"> <i class="fa fa-shopping-cart mr-2"></i>Add to Cart</button>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-6"><a href="#"> <i class="far fa-heart mr-2"></i>Add to wishlist </a></div>
                          <div class="col-6 text-right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item mr-2"><a class="text-dark text-hover-primary" href="#"><i class="fab fa-facebook-f"> </i></a></li>
                              <li class="list-inline-item"><a class="text-dark text-hover-primary" href="#"><i class="fab fa-twitter"> </i></a></li>
                            </ul>
                          </div>
                        </div>
                        <ul class="list-unstyled">
                          <li><strong>Category:</strong> <a class="text-muted" href="#">Jeans</a></li>
                          <li><strong>Tags:</strong> <a class="text-muted" href="#">Leisure</a>, <a class="text-muted" href="#">Elegant</a></li>
                        </ul>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of All Product -->
      @endsection
