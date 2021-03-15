@extends('layouts.app')
@section('content')
<section id="order-list" class="top-bottom-empty download">
    <!-- <div class="main-title-bottom"> -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>DOWNLOAD</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>DOWNLOAD</div>
                    </div>
                </div>
            </div>
            <div class="list-title">
                <div class="row">
                    <div class="col-9">File</div>
                    <div class="col-3"></div>
                </div>
            </div>
            <div class="list-wrap">
                @foreach ($data as $file)
                <div class="list">
                    <div class="row">
                        <div class="col-12 col-lg-10">
                            <span class="item-title">File&nbsp</span>
                            <span>{{ $file->title }}</span>
                        </div>

                        <div class="col-12 col-lg-2">
                            <a href="/uploads/{{ $file->path }}" target="_blank">
                                <button>Download</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $data->links() }}
    </div>
</section>
@endsection
