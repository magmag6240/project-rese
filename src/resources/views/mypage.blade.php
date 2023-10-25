@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">
    <p class="user-name"></p>
    <div class="mypage-contents">
        <div class="reserve-list">
            <p class="reserve-list-title">予約状況</p>
            <div class="reserve-detail">
                <div class="reserve-detail-title">
                    <p class="reserve-number"></p>
                    <button class="reserve-delete-button"></button>
                </div>
                <div class="reserve-info">
                    <span class="reserve-shop-name"></span>
                    <span class="reserve-date"></span>
                    <span class="reserve-time"></span>
                    <span class="reserve-number"></span>
                </div>
            </div>
        </div>
        <div class="like-shop">
            <p class="like-shop-title">お気に入り店舗</p>
            <div class="like-shop-list">
                @foreach($like_shops_details as $shop)
                <div class="shop">
                    <img class="shop-img" src="{{$shop->image_url}}">
                    <span class="shop-name">{{$shop->shop_name}}</span>
                    <div class="shop-info">
                        <span class="shop-pref">
                            #{{$shop->prefecture->name}}
                        </span>
                        <span class="shop-genre">
                            #{{$shop->genre->name}}
                        </span>
                    </div>
                    <div class="shop-button">
                        <button class="shop-detail-button">
                            <a class="shop-detail-link" href="{{route('show', ['shop_id' => $shop->id])}}">詳しく見る</a>
                        </button>
                        @if($shop->like_shop())
                        <button class="unlike-button"><a class="unlike-link" href="{{route('unlike', ['shop_id' => $shop->id])}}"></a></button>
                        @else
                        <button class="like-button"><a class="like-link" href="{{route('like', ['shop_id' => $shop->id])}}"></a></button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection