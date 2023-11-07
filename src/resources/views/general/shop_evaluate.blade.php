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
        <form class="evaluate-form" action="{{ route('evaluate.post', ['shop_id' => $shop->id]) }}" method="post">
            @csrf
            <div class="evaluate-star">
                <span class="star" id="1">★</span>
                <span class="star" id="2">★</span>
                <span class="star" id="3">★</span>
                <span class="star" id="4">★</span>
                <span class="star" id="5">★</span>
            </div>
            <div class="comments">
                <div>
                    <p>タイトル</p>
                    <input type="text">
                </div>
                <div>
                    <p>感想</p>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="evaluate-confirm">
                <div>
                    <p>タイトル</p>
                    <span></span>
                </div>
                <div>
                    <p>感想</p>
                    <span></span>
                </div>
            </div>
            <button class="reserve-button" type="submit">投稿する</button>
        </form>
    </div>
</div>
<script src="{{ mix('js/evaluate.js') }}"></script>

@endsection