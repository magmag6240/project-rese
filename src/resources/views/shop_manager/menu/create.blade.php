@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/menu/create.css') }}">
@endsection

@section('content')

<div class="shop-menu-new">
    <div class="shop-menu-new-title">
        <button class="shop-list-button" type="button"><a class="shop-list-link" href="/shop_manager/shop_list"><</a></button>
        <h1 class="shop-menu-new-title-text">コースプラン 新規作成</h1>
    </div>
    <form class="create-form" action="{{route('shop_manager.menu.store', ['shop_id' => $shop->id])}}" method="post">
        @csrf
        <table class="create-form-table">
            <tr class="create-form-table-tr">
                <td class="create-table-title">Menu name</td>
                <td class="create-table-td">
                    <input class="menu-name" type="text" name="menu_name" id="menu_name">
                    <div class="form-error-menu-name">
                        @error('menu_name')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Price</td>
                <td class="create-table-td">
                    <input class="menu-price" type="text" name="price" id="price">
                    <div class="form-error-price">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Menu Introduction</td>
                <td class="create-table-td">
                    <textarea class="menu-detail" name="menu_detail" id="menu_detail" cols="30" rows="10"></textarea>
                    <div class="form-error-menu-detail">
                        @error('menu_detail')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
        </table>
        <button class="information-create-button" type="submit">新規作成</button>
    </form>
</div>

@endsection