<header class='fixed-top'>
	<nav class="navbar navbar-expand-xl navbar-light .navbar-toggler-icon ">
		<a class="navbar-brand" href="/">
			<img src="/img/svg/logo-02.png">
		</a>
		<div class="">
			<ul class='navbar-userM'>
				<li>
                    <a href="shop-cart.php">
                    @include('mixin.svg.navbar1')
					<p>SHOPPING CAR</p>
				    </a>
                </li>
				<li>
                    @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    @endauth
                    @guest
                    <a href="/login">
                    @endguest
                    @include('mixin.svg.navbar2')
                    @auth
                    <p>LOG OUT</p>
                    @endauth
                    @guest
                    <p>LOG IN</p>
                    @endguest
                    </a>
                </li>
                @auth
                <li>
                    <a href="order-list.php">
                        <img src="/img/svg/order-w.svg" alt="">
                        <p>ORDER LIST</p>
                    </a>
                </li>
                @endauth
			</ul>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a class="navbar-brand" href="/">
				<img src="/img/svg/logo-01.png">
			</a>
			<ul class="navbar-nav">
				<li class="nav-item header-input" style="">
				<form>
					<input type="text" class="form-control" style="color: #495057!important;">
					<button type="submit">
                    @include('mixin.svg.navbar3')
					</button>
				</form>
				</li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('about') }}">COMPANY<span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				PRODUCT
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<ul class='dropdown-submenu'>
						<li>
							<h3 class="dropdown-item dropdown-main">New product</h3>
							<ul class="dropdown-menu">
                                @foreach (App\Product::select('id','name')->orderBy('id','desc')->limit(7)->get() as $item)
                                <li>
                                    <a href="/product/{{ $item->id }}">{{ $item->name }}</a>
                                </li>
                                @endforeach
							</ul>
						</li>
						<li>
							<h3 class="dropdown-item dropdown-main">Category</h3>
							<ul class="dropdown-menu">
                                @foreach (App\Category::select('id','name')->orderBy('id','desc')->limit(7)->get() as $item)
                                <li>
                                    <a href="/category/{{ $item->id }}">{{ $item->name }}</a>
                                </li>
                                @endforeach
							</ul>
						</li>
					</ul>
				</div>
		      </li>

			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('service') }}">SERVICE</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('tech') }}">TECHNOLOGY </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('faq') }}">FAQ </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('download') }}">DOWNLOAD </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('contact') }}">CONTACT US </a>
			  </li>
			</ul>
			<ul class='navbar-user'>
				<li>
                    <a href="shop-cart.php">
                        @include('mixin.svg.navbar4')
                        <p style="position: relative;">SHOPPING CAR
                            <span class="badge custom-badges">5</span>
                        </p>
                    </a>
                </li>
				<li>
                @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                @endauth
                @guest
                <a href="/login">
                @endguest
                @include('mixin.svg.navbar5')
                @auth
                <p>LOG OUT</p>
                @endauth
                @guest
                <p>LOG IN</p>
                @endguest
				</a>
            </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @auth
                <li>
                    <a href="order-list.php">
                        <img src="/img/svg/order-w.svg" alt="" style="background-color: #4b4b4b;border-radius: 5px;padding: 0;">
                        <p>ORDER LIST</p>
                    </a>
                </li>
                @endauth
			</ul>
		</div>
	</nav>
</header>
<form class="container-fluid header-input">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-10 offset-md-1">
					<input type="text" class='form-control'>
					<button type="submit">
						@include('mixin.svg.navbar6')
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
