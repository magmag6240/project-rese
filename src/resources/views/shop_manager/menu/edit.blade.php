@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/menu/edit.css') }}">
@endsection

@section('content')

<div class="menu-info-edit">
    <div class="menu-edit-confirm">
        <div class="menu-info-before">
            <p class="menu-before-title">変更前</p>
            <table class="menu-confirm-table">
                @foreach($menu as $menu)
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Course name</td>
                    <td class="confirm-table-td" id="name_before">{{$menu->menu_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Price</td>
                    <td class="confirm-table-td" id="price_before">{{$menu->price}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Menu Introduction</td>
                    <td class="confirm-table-td" id="menu_detail_before">{{$menu->menu_detail}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <span class="menu-info-change"></span>
        <div class="menu-info-after">
            <p class="menu-after-title">変更後</p>
            <table class="menu-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Course name</td>
                    <td class="confirm-table-td" id="name_after"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Price</td>
                    <td class="confirm-table-td" id="price_after"></td>
                </tr>
                <div class="confirm-table-tr">
                    <td class="confirm-table-title">Course Introduction</td>
                    <td class="confirm-table-td" id="menu_detail_after"></td>
                </div>
            </table>
        </div>
    </div>
    <div class="menu-edit-contents">
        <h1 class="menu-edit-title">コースプラン内容編集</h1>
        @foreach($menu as $menu)
        <form class="menu-edit-form" action="{{ route('shop_manager.menu.update', ['menu_id' => $menu->id]) }}" method="post">
            @method('patch')
            @csrf
            <table class="edit-form-table">
                <tr class="edit-form-table-tr">
                    <td class="edit-form-table-title">Course name</td>
                    <td class="edit-form-table-td">
                        <input class="menu-name" type="text" name="name" id="name">
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-form-table-title">Price</td>
                    <td class="edit-form-table-td">
                        <input class="menu-price" type="text" name="price" id="price">
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-form-table-title">Course Introduction</td>
                    <td class="edit-form-table-td">
                        <textarea class="menu-detail" name="menu_detail" id="menu_detail" cols="30" rows="10"></textarea>
                    </td>
                </tr>
            </table>
            <button class="information-update-button" type="submit">変更</button>
        </form>
        @endforeach
    </div>
</div>
<script src="{{ mix('js/shop_menu_edit.js') }}"></script>

@endsection