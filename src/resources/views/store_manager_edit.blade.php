@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_manager_edit.css') }}">
@endsection

@section('content')

<div class="store-manager-edit">
    <div class="store-information">
        <form class="information-form" action="{{route('store_manager.update')}}" method="post">
            @method('patch')
            @csrf
            <table class="information-table">
                <tr class="information-table-tr">
                    <td class="information-table-td">店舗名</td>
                    <td class="information-table-td"></td>
                </tr>
                <tr class="information-table-tr">
                    <td class="information-table-td">都道府県名</td>
                    <td class="information-table-td"></td>
                </tr>
                <tr class="information-table-tr">
                    <td class="information-table-td">ジャンル名</td>
                    <td class="information-table-td"></td>
                </tr>
                <tr class="information-table-tr">
                    <td class="information-table-td">店舗紹介</td>
                    <td class="information-table-td"></td>
                </tr>
                <tr class="information-table-tr">
                    <td class="information-table-td">店舗イメージ画像URL</td>
                    <td class="information-table-td"></td>
                </tr>
            </table>
            <button class="information-update-button" type="submit">更新・変更</button>
        </form>
    </div>
</div>

@endsection