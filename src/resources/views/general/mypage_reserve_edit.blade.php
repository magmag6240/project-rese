@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/reserve_edit.css') }}">
@endsection

@section('content')

<div class="reserve-edit">
    <div class="reserve-confirm">
        <div class="reserve-before">
            <p class="reserve-before-title">変更前</p>
            <table class="reserve-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop</td>
                    <td class="confirm-table-td">{{$reserve->shop->shop_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Date</td>
                    <td class="confirm-table-td">{{$reserve->reserve_date}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Time</td>
                    <td class="confirm-table-td">{{$reserve->start_time}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Number</td>
                    <td class="confirm-table-td">{{$reserve->number}}</td>
                </tr>
            </table>
        </div>
        <span class="reserve-change"></span>
        <div class="reserve-after">
            <p class="reserve-after-title">変更後</p>
            <table class="reserve-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop</td>
                    <td class="confirm-table-td">{{$reserve->shop->shop_name}}</td>
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
            </table>
        </div>
    </div>
    <div class="reserve-edit-contents">
        <h1 class="reserve-edit-title">予約内容編集</h1>
        <form class="edit-form" action="{{route('reserve.update', ['reserve_id' => $reserve->id])}}" method="post">
            @method('patch')
            @csrf
            <span class="reserve-date-title">Date</span>
            <input class="reserve-date" type="date" name="reserve_date" id="reserve_date">
            <span class="reserve-time-title">Time</span>
            <label class="reserve-select-time">
                <select class="reserve-time" name="start_time" id="start_time">
                    <option value="">選択してください</option>
                    @foreach($business_hour as $time)
                    <option value="{{$time}}">{{$time}}</option>
                    @endforeach
                </select>
            </label>
            <span class="reserve-number-title">Number</span>
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
            @if(session('message'))
            <div class="reserve-edit-alarm">
                {{ session('message') }}
            </div>
            @endif
            <button class="information-update-button" type="submit">変更</button>
        </form>
    </div>
</div>
<script src="{{ mix('js/reserve_confirm.js') }}"></script>

@endsection