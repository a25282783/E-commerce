    <!-- Sidebar Cart Modal-->
    <div class="modal fade modal-right" id="sidebarCart" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content sidebar-cart-content">
            <div class="modal-header border-0">
              <button class="close modal-close close-rotate" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
                  <use xlink:href="#close-1"> </use>
                </svg>
              </button>
            </div>
            <div class="modal-body px-5 sidebar-cart-body">
              <!-- Empty cart snippet-->
              <!-- In case of empty cart - display this snippet + remove .d-none-->
              <div class="d-none text-center mb-5">
                <svg class="svg-icon w-3rem h-3rem svg-icon-light mb-4 text-muted">
                  <use xlink:href="#retail-bag-1"> </use>
                </svg>
                <p>你的購物車是空的唷 </p>
              </div>
              <!-- Empty cart snippet end-->
              <div class="sidebar-cart-product-wrapper custom-scrollbar">

                <!-- cart item-->
                <div class="navbar-cart-product">
                  <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/book-sq.jpg" alt="..."/></a>
                    <div class="w-100"><a class="close" href="#">
                        <svg class="svg-icon sidebar-cart-icon">
                          <use xlink:href="#close-1"> </use>
                        </svg></a>
                      <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">Furniture source book</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$399     </strong></div>
                    </div>
                  </div>
                </div>

                <!-- cart item-->
                <div class="navbar-cart-product">
                  <div class="d-flex align-items-center"><a href="detail-2.html"><img class="img-fluid navbar-cart-product-image" src="img/product/chair-2-sq.jpg" alt="..."/></a>
                    <div class="w-100"><a class="close" href="#">
                        <svg class="svg-icon sidebar-cart-icon">
                          <use xlink:href="#close-1"> </use>
                        </svg></a>
                      <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-2.html">Norwegg design chair</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$1399     </strong></div>
                    </div>
                  </div>
                </div>
                <!-- /cart item-->

              </div>
            </div>
            <div class="modal-footer sidebar-cart-footer shadow">
              <div class="w-100">
                <h5 class="mb-4">小計: <span class="float-right">$1,798</span></h5><a class="btn btn-outline-dark btn-block mb-3" href="cart.html">查看購物車</a><a class="btn btn-dark btn-block" href="checkout.html">結帳</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Sidebar Cart Modal-->
 <!-- Contact model -->
 <div class="modal fade" id="contactmodel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button class="close close-absolute" type="button" data-dismiss="modal" aria-label="Close">
          <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
            <use xlink:href="#close-1"> </use>
          </svg>
        </button>

        <div class="modal-body p-5">
          <ul class="nav list-inline" role="tablist">
            <li class="list-inline-item">聯絡我們</li>
          </ul>
          <hr class="mb-3">
          <div class="tab-content">
            <div class="tab-pane active fade show px-3">
                @if ($config)
                    @isset($config->line)
                    <a class="text-decoration-none" href="{{$config->line}}">
                        <img src="/img/line_btn.png">
                      </a>
                    @endisset
                    @isset($config->fb)
                    <a class="text-decoration-none" href="{{$config->fb}}">
                        <img src="/img/fb_btn.png">
                      </a>
                    @endisset
                    @isset($config->messenger)
                    <a class="text-decoration-none" href="{{$config->messenger}}">
                        <img src="/img/fbmsger_btn.png">
                      </a>
                    @endisset
                    @isset($config->mail)
                    <a class="text-decoration-none" href="mailto:{{$config->mail}}">
                        <img src="/img/mail_btn.png">
                      </a>
                    @endisset
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- /Contact model -->
<footer>
    <div class="py-6 text-muted" >
      <div class="container" style="">
        <div class="row">
        @if ($config && $config->shop_intro)
        <div class="col-lg-8">
            <h6 class="text-dark letter-spacing-1 mb-4">商家介紹</h6>
            <p class="text-sm mb-3">
                {!! nl2br($config->shop_intro) !!}
            </p>
        </div>
        @endif
          <div class="col-lg-4" >
            <h6 class="text-dark letter-spacing-1 mb-4 d-none d-lg-block">聯絡我們</h6>
            @if ($config)
            @isset($config->line)
            <a class="" href="{{$config->line}}">
                <img src="/img/line_btn.png">
              </a>
            @endisset
            @isset($config->fb)
            <a class="" href="{{$config->fb}}">
                <img src="/img/fb_btn.png">
              </a>
            @endisset
            @isset($config->messenger)
            <a class="" href="{{$config->messenger}}">
                <img src="/img/fbmsger_btn.png">
              </a>
            @endisset
            @isset($config->mail)
            <a class="" href="mailto:{{$config->mail}}">
                <img src="/img/mail_btn.png">
              </a>
            @endisset
        @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright section of the footer-->
    <div class="py-4 font-weight-light text-muted">
      <div class="container">
        <div class="row align-items-center text-sm text-gray-500">
          <div class="col-lg-4 text-center text-lg-left">
            <p class="mb-lg-0">&copy; 2021 SCU Life p!ckup.  All rights reserved.</p>
          </div>
          <div class="col-lg-8">
            <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-lg-right">
                <li class="list-inline-item">
                    <a class="text-reset" href="#">
                    Terms &amp; Conditions
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset" href="#">
                        Privacy &amp; cookies
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset" href="#">
                        Accessibility
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset" href="#">
                        Customer Data Promise
                    </a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /Footer end-->
  <!-- JavaScript files-->
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to Bootstrapious website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://demo.bootstrapious.com/varkala/1-1/icons/orion-svg-sprite.svg');
    injectSvgSprite('https://demo.bootstrapious.com/varkala/1-1/icons/varkala-clothes.svg');
    injectSvgSprite('https://demo.bootstrapious.com/varkala/1-1/img/shape/blob-sprite.svg');

  </script>
  <!-- jQuery-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <!-- Bootstrap Bundle -->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Swiper Carousel                       -->
  <script src="/vendor/swiper/js/swiper.min.js"></script>
  <!-- Bootstrap Select-->
  <script src="/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <!-- AOS - AnimationOnScroll-->
  <script src="/vendor/aos/aos.js"></script>
  <!-- Custom Scrollbar-->
  <script src="/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="/js/custom-scrollbar-init.js"></script>
  <!-- Smooth scroll-->
  <script src="/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
  <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
  <script src="/vendor/object-fit-images/ofi.min.js"></script>
  <!-- JavaScript Countdown-->
  <script src="/js/countdown.js"></script>
  <script src="/vendor/photoswipe/photoswipe.min.js"></script>
    <script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/js/photoswipe-init.js"></script>
    <!-- Image Zoom plugin-->
    <script src="/vendor/jquery-zoom/jquery.zoom.min.js"></script>
  <script>
    var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    var countdown = new Countdown('countdown', deadline);

  </script>
  <!-- Some theme config-->
  <script>
    var options = {
        navbarExpandPx: 992
    }

  </script>
  <!-- Main Theme files-->
  <script src="/js/sliders-init.js"></script>
  <script src="/js/theme.js"></script>
