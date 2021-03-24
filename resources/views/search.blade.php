@extends('layouts.app')
@section('content')
<style>
    ul{
        margin: 0 auto;
    }
    li{
        list-style-type: disclosure-closed;
        margin-bottom: 10px;
    }
</style>
<section id="product-inner">
	<div class="container">
		<div class="row" style="height: 100vh;">
            @if (count($data)==0)
                <p>No Result~</p>
            @else
            <ul >
                @foreach ($data as $item)
                    <li>
                        <a href="/product/{{$item->id}}">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</section>
@endsection
