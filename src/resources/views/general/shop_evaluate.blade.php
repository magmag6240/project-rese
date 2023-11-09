@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/shop_evaluate.css') }}">
@endsection

@section('content')

<div class="shop-detail">
    <div class="shop-detail-contents">
        <div class="shop-detail-title">
            <button class="shop-list-button"><a class="shop-list-link" href="/"><</a></button>
            <span class="shop-name">{{$shop->shop_name}}</span>
        </div>
        <div class="shop-detail-info">
            <img class="shop-img" src="{{$shop->image_url}}">
            <div class="shop-area-genre">
                <span class="shop-pref">#{{$shop->prefecture->pref_name}}</span>
                <span class="shop-genre">#{{$shop->genre->genre_name}}</span>
            </div>
            <p class="shop-text">{{$shop->shop_detail}}</p>
        </div>
    </div>
    <div class="shop-evaluate">
        <p class="evaluate-title">評価</p>
        <div class="evaluate-list">
            @foreach($evaluate as $data)
            <div class="evaluate-group">
                <p class="evaluate-contents-title">点数</p>
                <p class="evaluate-contents">{{$data->stars}}</p>
            </div>
            <div class="evaluate-group">
                <p class="evaluate-contents-title">感想</p>
                <p class="evaluate-contents">{{$data->comments}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{{ mix('js/evaluate.js') }}"></script>

@endsection