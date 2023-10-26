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
                @if(session('message'))
                <div>
                    {{ session('message') }}
                </div>
                @endif
                @foreach($like_shops as $item)
                <div class="shop">
                    <img class="shop-img" src="{{$item->shop->image_url}}">
                    <span class="shop-name">{{$item->shop->shop_name}}</span>
                    <div class="shop-info">
                        <span class="shop-pref">
                            #{{$item->shop->prefecture->pref_name}}
                        </span>
                        <span class="shop-genre">
                            #{{$item->shop->genre->genre_name}}
                        </span>
                    </div>
                    <div class="shop-button">
                        <button class="shop-detail-button">
                            <a class="shop-detail-link" href="{{route('show', ['shop_id' => $item->shop->id])}}">詳しく見る</a>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection