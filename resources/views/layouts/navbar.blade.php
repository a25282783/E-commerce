<header class="header">
    <nav class="navbar navbar-expand-lg bg-transparent border-0 shadow-0 navbar-light px-lg-5 ">
        <a class="navbar-brand" href="/">
            <img src="/img/brand/scu_logo.png" style="max-height: 45px;">
        </a>
      <ul class="list-inline mb-0 d-block d-lg-none">
        <li class="list-inline-item mr-3">
            @auth
            <a class="text-dark text-hover-primary" href="{{ route('user') }}" >
                <svg class="svg-icon navbar-icon">
                    <use xlink:href="#avatar-1"> </use>
                </svg>
            </a>
            @endauth
            @guest
            <a class="text-dark text-hover-primary" href="/login">
                <svg class="svg-icon navbar-icon">
                    <use xlink:href="#avatar-1"> </use>
                </svg>
            </a>
            @endguest
        </li>
        <li class="list-inline-item position-relative mr-3">
            <a class="text-dark text-hover-primary" href="/order/list" >
                <svg class="svg-icon navbar-icon">
                    <use xlink:href="#retail-bag-1"> </use>
                </svg>
                @auth
                <div class="navbar-icon-badge">
                    {{ Auth::user()->carts->count() }}
                </div>
                @endauth
            </a>
        </li>
      </ul>

      <div class="collapse navbar-collapse" id="navbarContent">
        <form class="d-lg-flex ml-auto mr-lg-5 mr-xl-6 my-4 my-lg-0" action="#">
            <div class="input-group input-group-underlined">
              <input class="form-control form-control-underlined pl-3" type="text" placeholder="Search" aria-label="Search" aria-describedby="button-search">
              <div class="input-group-append ml-0">
                <button class="btn btn-underlined py-0" id="button-search" type="button">
                  <svg class="svg-icon navbar-icon">
                    <use xlink:href="#search-1"> </use>
                  </svg>
                </button>
              </div>
            </div>
          </form>
        <ul class="list-inline mb-0 d-none d-lg-block">
          <li class="list-inline-item mr-3">
              @auth
              <a class="text-dark text-hover-primary" href="{{ route('user') }}" >
                <svg class="svg-icon navbar-icon">
                  <use xlink:href="#avatar-1"> </use>
                </svg></a>
              @endauth
              @guest
              <a class="text-dark text-hover-primary"  href="/login">
                <svg class="svg-icon navbar-icon">
                  <use xlink:href="#avatar-1"> </use>
                </svg></a>
              @endguest
         </li>

          <li class="list-inline-item position-relative mr-3"><a class="text-dark text-hover-primary" href="#" data-toggle="modal" data-target="#sidebarCart">
              <svg class="svg-icon navbar-icon">
                <use xlink:href="#retail-bag-1"> </use>
              </svg>
              @auth
              <div class="navbar-icon-badge">{{ Auth::user()->carts->count() }}</div>
              @endauth
            </a></li>
        </ul>
      </div>
    </nav>
  </header>
