@extends('layouts.app')
@section('content')
<section id="news-inner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-wrap">
                    <img src="/uploads/{{ $data->banner }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>{{ $data->title }}</div>
                    </div>
                    <div class="content">
                      {!! $data->content !!}
                    </div>
                </div>
                <div class="btn-area arrow-btn">
                    <button onclick="history.back();"><div class="fa fa-arrow-circle-right"></div>BACK</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
