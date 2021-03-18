@extends('layouts.app')
@section('content')
<style>
    .form-required{
        padding: 0 !important;
        color: #e60e0efa;
    }
</style>
<section id="person-info" class="top-bottom-empty">
    <div class="main-title-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>Personal information</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title green-decor-title">
                        <div class="decor-squ"></div>
                        <div>member profile</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="form-wrap">
                        <form id="person-info-form" action="{{ route('update.user') }}" method="POST">
                            @csrf
                            <div class="item-wrap">
                                <label for="">ID</label>
                                <div class="input-wrap">
                                    <span>{{ $user->email }}</span>
                                </div>
                            </div>
                            @include('mixin.profile')
                            <div class="btn-area">
                                <button type="submit">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
