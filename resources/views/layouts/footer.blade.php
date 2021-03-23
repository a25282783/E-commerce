<footer class="container-fluid">
    @php
    $footer = App\Footer::first();
    @endphp
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-sm-6 footer-info">
					<h3>Customer service</h3>
					<p>{{ $footer->tel }}</p>
					<p>{{ $footer->fax }}</p>
					<p>s{{ $footer->email }}</p>
					<p>{{ $footer->address }}</p>
				</div>
				<div class="col-xl-3 col-lg-4 col-sm-3 col-6 footer-link">
					<ul>
						<li>
							<a href="/footer/payment">
								<img src="/img/svg/btn_arrow_w.svg" class='svg-farrow'>payment method
							</a>
						</li>
						<li>
							<a href="/footer/shipping">
								<img src="/img/svg/btn_arrow_w.svg" class='svg-farrow'>Shipping method
							</a>
						</li>
						<li>
							<a href="/footer/return">
								<img src="/img/svg/btn_arrow_w.svg" class='svg-farrow'>Return and exchange methods
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xl-3 col-lg-4 col-sm-3 col-6 footer-link">
					<ul>
						<li>
							<a href="/footer/service">
								<img src="/img/svg/btn_arrow_w.svg" class='svg-farrow'>Terms of Service
							</a>
						</li>
						<li>
							<a href="/footer/privacy">
								<img src="/img/svg/btn_arrow_w.svg" class='svg-farrow'>privacy policy
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xl-3 col-12 footer-social">
					<ul>
                        @if ($footer->fb!='')
                        <li>
                            <a href="{{ $footer->fb }}">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if ($footer->ig!='')
                        <li>
                            <a href="{{ $footer->ig }}">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        @endif
                        @if ($footer->line!='')
                        <li>
                            <a href="{{ $footer->line }}">
                                <i class="fab fa-line" style="font-size: 28px;"></i>
                            </a>
                        </li>
                        @endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="container-fluid">
  <div class="row">
  	<div class="col-12 copyright">
  		COPYRIGHT@moveon All Right Reserved 2020.  	</div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript" src='/js/custom.js'></script>

