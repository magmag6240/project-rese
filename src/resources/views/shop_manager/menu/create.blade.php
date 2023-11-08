@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/menu/create.css') }}">
@endsection

@section('content')

<div class="shop-menu-new">
    <h1 class="shop-menu-new-title">コースプラン 新規作成</h1>
    <form class="create-form" action="{{route('shop_manager.menu.store', ['shop_id' => $shop->id])}}" method="post">
        @csrf
        <table class="create-form-table">
            <tr class="create-form-table-tr">
                <td class="create-table-title">Course name</td>
                <td class="create-table-td">
                    <input class="menu-name" type="text" name="name" id="name">
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Price</td>
                <td class="create-table-td">
                    <input class="menu-price" type="text" name="price" id="price">
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Course Introduction</td>
                <td class="create-table-td">
                    <textarea class="menu-detail" name="menu_detail" id="menu_detail" cols="30" rows="10"></textarea>
                </td>
            </tr>
        </table>
        <button class="information-create-button" type="submit">新規作成</button>
    </form>
</div>

@endsection