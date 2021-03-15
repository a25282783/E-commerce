@extends('layouts.app')
@section('content')
<section id="about">
    @if ($data)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-wrap">
                    <img src="/uploads/{{ $data->banner }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container container-p">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="title green-decor-title">
                    <div class="decor-squ"></div>
                    <div>{{ $data->title1 }}</div>
                </div>
            </div>
            <div class="col-lg-7 col-12">
                <div class="content-wrap">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </div>
    <div class="middle-text">
        {{ $data->main }}
    </div>
    <div class="container container-p">
        <div class="row">
            <div class="col-12">
                <div class="title green-decor-title">
                    <div class="decor-squ"></div>
                    <div>{{ $data->title2 }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="svg-text-area">
                    <div class="img-wrap">
                        <img src="/img/about/svg/icon-01.svg" alt="">
                    </div>
                    <div class="title-area">
                        <p>{{ $data->main_title1 }}</p>
                    </div>
                    <div class="text-wrap">
                        <p>{{ $data->main_desc1 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="svg-text-area">
                    <div class="img-wrap">
                        <img src="/img/about/svg/icon-02.svg" alt="">
                    </div>
                    <div class="title-area">
                        <p>{{ $data->main_title2 }}</p>
                    </div>
                    <div class="text-wrap">
                        <p>{{ $data->main_desc2 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="svg-text-area">
                    <div class="img-wrap">
                        <img src="/img/about/svg/icon-03.svg" alt="">
                    </div>
                    <div class="title-area">
                        <p>{{ $data->main_title3 }}</p>
                    </div>
                    <div class="text-wrap">
                        <p>{{ $data->main_desc3 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="svg-text-area">
                    <div class="img-wrap">
                        <img src="/img/about/svg/icon-04.svg" alt="">
                    </div>
                    <div class="title-area">
                        <p>{{ $data->main_title4 }}</p>
                    </div>
                    <div class="text-wrap">
                        <p>{{ $data->main_desc4 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
