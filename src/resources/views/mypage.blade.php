@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage">
    <p class="user-name">{{$user->name}}さん</p>
    <div class="mypage-contents">
        <div class="reserve-list">
            <p class="reserve-list-title">予約状況</p>
            @foreach($reserve_shops as $reserve_shop)
            <div class="reserve-detail">
                <div class="reserve-detail-title">
                    <p class="reserve-number">予約</p>
                    <button class="reserve-delete-button"></button>
                </div>
                <table class="reserve-info">
                    <tr class="reserve-shop-name">
                        <td class="reserve-shop-name">Shop</td>
                        <td class="reserve-shop-name"></td>
                    </tr>
                    <tr class="reserve-date">
                        <td class="reserve-date">Date</td>
                        <td class="reserve-date"></td>
                    </tr>
                    <tr class="reserve-time">
                        <td class="reserve-time">Time</td>
                        <td class="reserve-time"></td>
                    </tr>
                    <tr class="reserve-people">
                        <td class="reserve-people">Number</td>
                        <td class="reserve-people"></td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        <div class="like-shop">
            <p class="like-shop-title">お気に入り店舗</p>
            <div class="like-shop-list">
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
                            <a class="shop-detail-link" href="{{route('reserve.index', ['shop_id' => $item->shop->id])}}">詳しく見る</a>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection