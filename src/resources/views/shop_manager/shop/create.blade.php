@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/shop/create.css') }}">
@endsection

@section('content')

<div class="shop-info-new">
    <div class="shop-create-title">
        <button class="shop-manager-button" type="button"><a class="shop-manager-home-link" href="/shop_manager"><</a></button>
        <h1 class="shop-create-title-text">登録店舗情報 新規作成</h1>
    </div>
    <form class="create-form" action="{{route('shop_manager.store')}}" method="post">
        @csrf
        <table class="create-form-table">
            <tr class="create-form-table-tr">
                <td class="create-table-title">Shop name</td>
                <td class="create-table-td">
                    <input class="shop-name" type="text" name="name" id="name">
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Prefecture</td>
                <td class="create-table-td">
                    <label class="shop-select-area">
                        <select class="shop-area" id="shop_area" name="area">
                            <option value="">select area</option>
                            @foreach($prefectures as $pref)
                            <option value="{{ $pref->id }}">{{ $pref->pref_name }}</option>
                            @endforeach
                        </select>
                    </label>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Genre</td>
                <td class="create-table-td">
                    <label class="shop-select-genre">
                        <select class="shop-genre" id="shop_genre" name="genre">
                            <option value="">select genre</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                            @endforeach
                        </select>
                    </label>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Shop Introduction</td>
                <td class="create-table-td">
                    <textarea class="shop-detail" name="shop_detail" id="shop_detail" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Shop Image URL</td>
                <td class="create-table-td">
                    <input class="shop-image-url" type="url" name="shop_image_url" id="shop_image_url">
                </td>
            </tr>
        </table>
        <button class="information-create-button" type="submit">新規作成</button>
    </form>
</div>

@endsection