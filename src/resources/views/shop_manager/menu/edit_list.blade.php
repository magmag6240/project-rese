@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/menu/edit_list.css') }}">
@endsection

@section('content')

<div class="shop-manager-menu-list">
    <h1 class="menu-list-title">コースプラン一覧</h1>
    <table class="menu-list-table">
        <tr class="menu-list-tr">
            <th class="menu-list-th">id</th>
            <th class="menu-list-th">Name</th>
            <th class="menu-list-th">Price</th>
            <th class="menu-list-th">Detail</th>
        </tr>
        @foreach($menu as $menu)
        <tr class="menu-list-tr">
            <td class="menu-list-td">
                {{$menu->id}}
            </td>
            <td class="menu-list-td">
                {{$menu->menu_name}}
            </td>
            <td class="menu-list-td">
                {{$menu->price}}
            </td>
            <td class="menu-list-td-detail">
                {{$menu->menu_detail}}
            </td>
            <td class="menu-list-td">
                <a class="menu-edit-link" href="{{route('shop_manager.menu.edit', ['menu_id' => $menu->id])}}">内容変更</a>
            </td>
        </tr>
        @endforeach
    </table>
    <button class="shop-list-button" type="button"><a class="shop-list-link" href="/shop_manager/shop_list">戻る</a></button>
</div>

@endsection