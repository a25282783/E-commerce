@extends('layouts.app')
@section('content')
<section id="footer-terms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <h1 class="main-title">{{ $main }}</h1>
                    @if ($data)
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>{{ $data->title }}</div>
                    </div>
                    <div class="content">
                        {!! $data->content !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
	</div>
</section>
<div class="leaf-img">
    <img src="/img/footer-terms/leaf.png" alt="">
</div>
@endsection
