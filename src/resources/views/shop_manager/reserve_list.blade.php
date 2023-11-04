@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/reserve_list.css') }}">
@endsection

@section('content')

<div class="shop-manager-reserve-list">
    <h1 class="reserve-list-title">店舗予約状況</h1>
    <table class="reserve-list-table">
        <tr class="reserve-list-tr">
            <th class="reserve-list-th">id</th>
            <th class="reserve-list-th">User name</th>
            <th class="reserve-list-th">Date</th>
            <th class="reserve-list-th">Time</th>
            <th class="reserve-list-th">Number</th>
        </tr>
        @foreach($reserves as $reserve)
        <tr class="reserve-list-tr">
            <td class="reserve-list-td">
                {{$reserve->id}}
            </td>
            <td class="reserve-list-td">
                {{$reserve->user->name}}
            </td>
            <td class="reserve-list-td">
                {{$reserve->reserve_date}}
            </td>
            <td class="reserve-list-td">
                {{$reserve->start_time}}
            </td>
            <td class="reserve-list-td">
                {{$reserve->number}}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="reserve-paginate">
        {{$reserves->links('vendor.pagination.shop_manager_reserve_list_paginate')}}
    </div>
    <button class="shop-list-button" type="button"><a class="shop-list-link" href="/shop_manager/shop_list">戻る</a></button>
</div>

@endsection