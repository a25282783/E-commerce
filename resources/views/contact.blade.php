@extends('layouts.app')
@section('content')
@isset($data->bg_img)
<style>
    .main-title-bottom{
        background-image: url(/uploads/{{ $data->bg_img }}) !important;
    }
</style>
@endisset
<section id="contact-us" class="top-bottom-empty">
    <div class="main-title-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>CONTACT US</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-wrap">
                        <div class="title green-decor-title">
                            <div class="decor-squ"></div>
                            <div>Contact info</div>
                        </div>
                        <div class="content">
                            <p>{{ $data->tel??'no info' }}</p>
                            <p>{{ $data->fax??'no info' }}</p>
                            <p>{{ $data->email??'no info' }}</p>
                            <p>{{ $data->address??'no info' }}</p>
                        </div>
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
                            <div>message board</div>
                        </div>
                        <div class="form-wrap">
                            <form action="{{ route('post.contact') }}" id="contact-us-form" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrap">
                                            <label for="name">NAME</label>
                                            <input id="name" name="name" type="text" placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrap">
                                            <label for="mobile">PHONE</label>
                                            <input id="mobile" name="mobile" type="number" placeholder="Enter Your Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap">
                                            <label for="email">E-MAIL</label>
                                            <input id="email" name="email" type="email" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap">
                                            <label for="title">TITLE</label>
                                            <input id="title" name="title" type="text" placeholder="Enter Your Title">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap textarea">
                                            <label for="content">MESSAGE</label>
                                            <textarea id="content" name="content" placeholder="Enter Your Message" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="btn-area">
                                            <input type="button" value="CLEAR" onclick="document.getElementById('contact-us-form').reset();">
                                            <input type="submit" value="SEND">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (session('msg'))
    <script>
        alert('{{ session("msg") }}');
    </script>
@endif
@endsection
