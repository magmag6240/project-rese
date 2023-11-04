@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/shop_manager_list.css') }}">
@endsection

@section('content')

<div class="admin-shop-manager-list">
    <h1 class="shop-manager-list-title">店舗代表者一覧</h1>
    <table class="shop-manager-list-table">
        <tr class="shop-manager-list-tr">
            <th class="shop-manager-list-th">id</th>
            <th class="shop-manager-list-th">User name</th>
            <th class="shop-manager-list-th">Email</th>
        </tr>
        @foreach($shop_managers as $data)
        <tr class="shop-manager-list-tr">
            <td class="shop-manager-list-td">
                {{$data->id}}
            </td>
            <td class="shop-manager-list-td">
                {{$data->name}}
            </td>
            <td class="shop-manager-list-td">
                {{$data->email}}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="shop-manager-paginate">
        {{$shop_managers->links('vendor.pagination.admin_shop_manager_list_paginate')}}
    </div>
    <button class="home-button" type="button"><a class="home-link" href="/admin">戻る</a></button>
</div>

@endsection