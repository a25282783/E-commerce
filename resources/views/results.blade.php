@extends('layouts.app')
@section('content')
<style>
    #verify{
        margin-top: 8rem;
        margin-bottom: 8rem;
    }
    #here{
        color: #3b76d2;
    }
</style>
<section id="product-inner">
<div class="container" id="verify">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $status }}</div>
                <div class="card-body">
                    @if ($type===0)
                    Payment fail,Try again later or contact us!
                    @endif
                    <br>
                    Redirect to order list in 5 seconds or click <span id="here"><a href='/order/list'>Here</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    setTimeout(function(){
        location.href='/order/list';
    },5000)
</script>
@endsection

