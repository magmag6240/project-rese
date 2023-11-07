@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/shop_list.css') }}">
@endsection

@section('content')

<div class="shop-manager-shop-list">
    <h1 class="shop-list-title">管理店舗一覧</h1>
    <table class="shop-list-table">
        <tr class="shop-list-tr">
            <th class="shop-list-th">id</th>
            <th class="shop-list-th">Shop name</th>
            <th class="shop-list-th">Prefecture</th>
            <th class="shop-list-th">Genre</th>
        </tr>
        @foreach($shops as $shop)
        <tr class="shop-list-tr">
            <td class="shop-list-td">
                {{$shop->id}}
            </td>
            <td class="shop-list-td">
                {{$shop->shop_name}}
            </td>
            <td class="shop-list-td">
                {{$shop->prefecture->pref_name}}
            </td>
            <td class="shop-list-td">
                {{$shop->genre->genre_name}}
            </td>
            <td class="shop-edit-link">
                <a class="shop-edit-link" href="{{route('shop_manager.edit',['shop_id' => $shop->id])}}">店舗情報変更</a>
            </td>
            <td class="shop-menu-new-link">
                <a class="shop-menu-new-link" href="{{route('shop_manager.menu.new',['shop_id' => $shop->id])}}">コースメニュー新規作成</a>
            </td>
            <td class="shop-menu-edit-link">
                <a class="shop-menu-edit-link" href="{{route('shop_manager.menu.edit',['shop_id' => $shop->id])}}">コースメニュー変更・更新</a>
            </td>
            <td class="shop-reserve-list-link">
                <a class="shop-reserve-list-link" href="{{route('shop_manager.reserve_list',['shop_id' => $shop->id])}}">予約情報</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="shop-paginate">
        {{$shops->links('vendor.pagination.shop_manager_shop_list_paginate')}}
    </div>
</div>

@endsection