<footer>
    <div class="py-6 text-muted" >
      <div class="container" style="">
        <div class="row">
        @php
        $company = App\Company::first();
        @endphp
        @isset($company)
        <div class="col-lg-8">
            <h6 class="text-dark letter-spacing-1 mb-4">{{ $data->title1 }}</h6>
            <p class="text-sm mb-3">
                {!! $data->content !!}
            </p>
            </div>
        @endisset
          <div class="col-lg-4" >
            <h6 class="text-dark letter-spacing-1 mb-4 d-none d-lg-block">聯絡我們</h6>
              <a class="" href="#">
                <img src="/img/line_btn.png">
              </a>
              <a class="" href="#">
                <img src="/img/fb_btn.png">
              </a>
              <a class="" href="#">
                <img src="/img/fbmsger_btn.png">
              </a>
              <a class="" href="#">
                <img src="/img/mail_btn.png">
              </a>
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
                    <a class="text-reset" href="/footer/service">
                    Terms &amp; Conditions
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset" href="/footer/privacy">
                        Privacy &amp; cookies
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset" href="/footer/Accessibility">
                        Accessibility
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset" href="/footer/shipping">
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
