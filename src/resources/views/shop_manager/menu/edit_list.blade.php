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
            <th class="shop-list-th">Course name</th>
            <th class="shop-list-th">Price</th>
            <th class="shop-list-th">Course Introduction</th>
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
            <td class="shop-list-td">
                {{$menu->menu_detail}}
            </td>
            <td class="menu-edit-link">
                <a class="menu-edit-link" href="{{route('shop_manager.menu.edit',['menu_id' => $menu->id])}}">コースプラン内容変更</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="menu-paginate">
        
    </div>
</div>

@endsection