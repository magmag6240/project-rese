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
        @if(session('message'))
        <div>
            {{ session('message') }}
        </div>
        @endif
        <form class="reserve-form" action="{{ route('reserve', ['shop_id' => $shop_detail->id]) }}" method="post">
            @csrf
            <input class="reserve-date" type="date">
            <div class="reserve-select">
                <select class="reserve-time" name="" id="">
                    @foreach($business_hour as $time)
                    <option value="{{$time}}">{{$time}}</option>
                    @endforeach
                </select>
                <select class="reserve-number" name="" id=""></select>
            </div>
            <div class="reserve-confirm">
                <table class="reserve-confirm-table">
                    <tr class="reserve-table-tr-shop">
                        <td class="reserve-table-name">Shop</td>
                        <td class="reserve-table-name">{{$shop_detail->shop_name}}</td>
                    </tr>
                    <tr class="reserve-table-tr-date">
                        <td class="reserve-table-date">Date</td>
                        <td class="reserve-table-date"></td>
                    </tr>
                    <tr class="reserve-table-tr-time">
                        <td class="reserve-table-time">Time</td>
                        <td class="reserve-table-time"></td>
                    </tr>
                    <tr class="reserve-table-tr-number">
                        <td class="reserve-table-number">Number</td>
                        <td class="reserve-table-number"></td>
                    </tr>
                </table>
            </div>
            <button class="reserve-button">予約する</button>
        </form>
    </div>
</div>

@endsection