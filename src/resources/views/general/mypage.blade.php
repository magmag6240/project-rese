@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/mypage.css') }}">
@endsection

@section('content')

<div class="mypage">
    <p class="user-name">{{$user->name}}さん</p>
    <div class="mypage-contents">
        <div class="reserve-list">
            <p class="reserve-list-title">予約状況</p>
            @foreach($reserve_shops as $item)
            <div class="reserve-detail">
                <form class="reserve-delete" action="{{route('reserve.destroy', ['reserve_id' => $item->id ])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="reserve-detail-title">
                        <p class="reserve-number">予約{{$item->id}}</p>
                        <button class="reserve-delete-button" type="submit"></button>
                    </div>
                </form>
                <table class="reserve-table">
                    <tr class="reserve-table-tr">
                        <td class="reserve-table-td">Shop</td>
                        <td class="reserve-table-td">{{$item->shop->shop_name}}</td>
                    </tr>
                    <tr class="reserve-table-tr">
                        <td class="reserve-table-td">Date</td>
                        <td class="reserve-table-td">{{$item->reserve_date}}</td>
                    </tr>
                    <tr class="reserve-table-tr">
                        <td class="reserve-table-td">Time</td>
                        <td class="reserve-table-td">{{$item->start_time}}</td>
                    </tr>
                    <tr class="reserve-table-tr">
                        <td class="reserve-table-td">Number</td>
                        <td class="reserve-table-td">{{$item->number}}人</td>
                    </tr>
                </table>
                <button class="reserve-edit-button"><a href="{{route('reserve.edit', ['reserve_id' => $item->id ])}}">予約内容変更</a></button>
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
                        <div class="like">
                            @if($item->is_liked())
                            <a class="unlike-link" href="{{ route('unlike', ['shop_id' => $item->shop->id]) }}"></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @endsection