@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/shop_detail.css') }}">
@endsection

@section('content')

<div class="shop-detail">
    <div class="shop-detail-contents">
        <div class="shop-detail-title">
            <button class="shop-list-button"><a class="shop-list-link" href="/"><</a></button>
            <span class="shop-name">{{$shop_detail->shop_name}}</span>
        </div>
        <div class="js-tab-panel">
            <div class="js-tab-panel-group">
                <p class="js-tab active_tab">店舗紹介</p>
                <p class="js-tab inactive_tab">コースプラン一覧</p>
            </div>
            <div class="js-panel active_content">
                <img class="shop-img" src="{{$shop_detail->image_url}}">
                <div class="shop-area-genre">
                    <span class="shop-pref">#{{$shop_detail->prefecture->pref_name}}</span>
                    <span class="shop-genre">#{{$shop_detail->genre->genre_name}}</span>
                </div>
                <p class="shop-text">{{$shop_detail->shop_detail}}</p>
            </div>
            <div class="js-panel inactive_content">
                @foreach($menu_detail as $menu)
                <div class="menu-group">
                    <span class="menu-info">{{$menu->menu_name}}: ￥{{$menu->price}}</span>
                    <p class="menu-detail">{{$menu->menu_detail}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="shop-reserve">
        <p class="reserve-title">予約</p>
        <form class="reserve-form" action="{{ route('reserve.store', ['shop_id' => $shop_detail->id]) }}" method="post">
            @csrf
            <input class="reserve-date" type="date" name="reserve_date" id="reserve_date">
            <div class="form-error-date">
                @error('reserve_date')
                {{ $message }}
                @enderror
            </div>
            <label class="reserve-select-time">
                <select class="reserve-time" name="start_time" id="start_time">
                    <option value="">選択してください</option>
                    @foreach($business_hour as $time)
                    <option value="{{$time}}">{{$time}}</option>
                    @endforeach
                </select>
            </label>
            <div class="form-error-time">
                @error('start_time')
                {{ $message }}
                @enderror
            </div>
            <label class="reserve-select-number">
                <select class="reserve-number" name="number" id="number">
                    <option value="">選択してください</option>
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                    <option value="9">9人</option>
                    <option value="10">10人</option>
                </select>
            </label>
            <div class="form-error-number">
                @error('number')
                {{ $message }}
                @enderror
            </div>
            <label class="reserve-select-menu">
                <select class="reserve-menu" name="menu_id" id="menu_id">
                    <option value="">コースをご希望の場合は選択してください</option>
                    @foreach($menu_detail as $menu)
                    <option value="{{$menu->id}}">{{$menu->menu_name}}</option>
                    @endforeach
                </select>
            </label>
            <p class="reserve-menu-text">※コースを選択された場合、コース分の金額は事前決済となります。</p>
            <div class="reserve-confirm">
                <table class="reserve-confirm-table">
                    <tr class="confirm-table-tr">
                        <td class="confirm-table-td">Shop</td>
                        <td class="confirm-table-td">{{$shop_detail->shop_name}}</td>
                    </tr>
                    <tr class="confirm-table-tr">
                        <td class="confirm-table-td">Date</td>
                        <td class="confirm-table-td" id="reserve_date_confirm"></td>
                    </tr>
                    <tr class="confirm-table-tr">
                        <td class="confirm-table-td">Time</td>
                        <td class="confirm-table-td" id="start_time_confirm"></td>
                    </tr>
                    <tr class="confirm-table-tr">
                        <td class="confirm-table-td">Number</td>
                        <td class="confirm-table-td" id="number_confirm"></td>
                    </tr>
                    <tr class="confirm-table-tr">
                        <td class="confirm-table-td">Menu</td>
                        <td class="confirm-table-td" id="menu_confirm"></td>
                    </tr>
                </table>
            </div>
            @if(session('message'))
            <div class="shop-reserve-alarm">
                {{ session('message') }}
            </div>
            @endif
            <button class="reserve-button" type="submit">予約する</button>
        </form>
    </div>
</div>
<script src="{{ mix('js/reserve_confirm.js') }}"></script>
<script src="{{ mix('js/tab.js') }}"></script>
@endsection