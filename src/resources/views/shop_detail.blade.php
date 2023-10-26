@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('content')
<div class="shop-detail">
    <div class="shop-detail-contents">
        <div class="shop-detail-title">
            <button class="shop-list-button"><a class="shop-list-link" href="/"><</a></button>
            <span class="shop-name">{{$shop_detail->shop_name}}</span>
        </div>
        <div class="shop-detail-info">
            <img class="shop-img" src="{{$shop_detail->image_url}}">
            <div class="shop-info">
                <span class="shop-pref">#{{$shop_detail->prefecture->pref_name}}</span>
                <span class="shop-genre">#{{$shop_detail->genre->genre_name}}</span>
            </div>
            <p class="shop-text">{{$shop_detail->shop_detail}}</p>
        </div>
    </div>
    <div class="shop-reserve">
        <p class="reserve-title">予約</p>
        <input type="date">
        <select name="" id=""></select>
        <select name="" id=""></select>
        <div class="reserve-confirm">
            <span class="reserve-shop-name">{{$shop_detail->shop_name}}</span>
            <span class="reserve-date"></span>
            <span class="reserve-time"></span>
            <span class="reserve-number"></span>
        </div>
        <button class="reserve-button">予約する</button>
        @if(session('message'))
        <div>
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>

@endsection