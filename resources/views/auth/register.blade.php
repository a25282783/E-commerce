@extends('layouts.app')
@section('content')
<style>
    .form-required{
        padding: 0 !important;
        color: #e60e0efa;
    }
</style>
<section id="person-login-register" class="top-bottom-empty">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>REGISTRATION</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info-bottom">
        <div class="container">
            <div class="row">

                <div class="col-12 col-xl-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>CREATE ACCOUNT</div>
                    </div>
                    <div class="form-wrap">
                        @include('mixin.register-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
