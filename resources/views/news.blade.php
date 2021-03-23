@extends('layouts.app')
@section('content')
<section id="news" class="top-bottom-empty">
    <div class="main-title-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>News</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>News</div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $news)
                <div class="col-12">
                    <a href="/news/show/{{ $news->id }}">
                        <div class="news-wrap">
                            <div class="date">
                                {{ date("Y-m-d",strtotime($news->updated_at)) }}
                            </div>
                            <div class="excerpt">
                                {{ $news->title }}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        {{ $data->links() }}
    </div>
</section>
@endsection
