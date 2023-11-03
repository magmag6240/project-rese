@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_manager_new.css') }}">
@endsection

@section('content')

<div class="store-manager-new">
    <h1 class="store-create-title">登録店舗情報 新規作成</h1>
    <form class="create-form" action="{{route('store_manager.create')}}" method="post">
        @csrf
        <table class="create-form-table">
            <tr class="create-form-table-tr">
                <td class="create-table-title">店舗名</td>
                <td class="create-table-td">
                    <input class="shop-name" type="text">
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">都道府県名</td>
                <td class="create-table-td">
                    <select class="search-area" id="search_area" name="area">
                        <option value="">選択してください</option>
                        @foreach($prefectures as $pref)
                        <option value="{{ $pref->id }}">{{ $pref->pref_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">ジャンル名</td>
                <td class="create-table-td">
                    <select class="search-genre" id="search_genre" name="genre">
                        <option value="">選択してください</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">店舗紹介</td>
                <td class="create-table-td">
                    <textarea class="" name="" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">店舗イメージ画像URL</td>
                <td class="create-table-td">
                    <input class="shop-image-url" type="url">
                </td>
            </tr>
        </table>
        <button class="information-create-button" type="submit">新規作成</button>
    </form>
</div>

@endsection