@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/shop/edit.css') }}">
@endsection

@section('content')

<div class="shop-info-edit">
    <div class="shop-edit-contents">
        <div class="shop-edit-title">
            <button class="shop-list-button" type="button"><a class="shop-list-link" href="/shop_manager/shop_list"><</a></button>
            <h1 class="shop-edit-title-text">店舗情報編集</h1>
        </div>
        <form class="edit-form" action="{{ route('shop_manager.update', $manage_shop->id) }}" method="post">
            @method('patch')
            @csrf
            <table class="edit-form-table">
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Shop name</td>
                    <td class="edit-table-td">
                        <input class="shop-name" type="text" name="shop_name" id="shop_name">
                        <div class="form-error-shop-name">
                            @error('shop_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Prefecture</td>
                    <td class="edit-table-td">
                        <label class="shop-select-area">
                            <select class="shop-area" id="prefecture_id" name="prefecture_id">
                                <option value="">select area</option>
                                @foreach($prefectures as $pref)
                                <option value="{{ $pref->id }}">{{ $pref->pref_name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="form-error-prefecture">
                            @error('prefecture_id')
                            {{ $message }}
                            @enderror
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Genre</td>
                    <td class="edit-table-td">
                        <label class="shop-select-genre">
                            <select class="shop-genre" id="genre_id" name="genre_id">
                                <option value="">select genre</option>
                                @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="form-error-genre">
                            @error('genre_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Shop Introduction</td>
                    <td class="edit-table-td">
                        <textarea class="shop-detail" name="shop_detail" id="shop_detail" cols="30" rows="10"></textarea>
                        <div class="form-error-shop-detail">
                            @error('shop_detail')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Shop Image URL</td>
                    <td class="edit-table-td">
                        <input class="shop-image-url" type="url" name="image_url" id="image_url">
                        <div class="form-error-image-url">
                        @error('image_url')
                        {{ $message }}
                        @enderror
                    </div>
                    </td>
                </tr>
            </table>
            <button class="information-update-button" type="submit">変更</button>
        </form>
    </div>
    <div class="shop-edit-confirm">
        <div class="shop-info-before">
            <p class="shop-before-title">変更前</p>
            <table class="shop-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Shop name</td>
                    <td class="confirm-table-td">{{$manage_shop->shop_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Prefecture</td>
                    <td class="confirm-table-td">{{$manage_shop->prefecture->pref_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Genre</td>
                    <td class="confirm-table-td">{{$manage_shop->genre->genre_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Shop Introduction</td>
                    <td class="confirm-table-td">{{$manage_shop->shop_detail}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Shop Image URL</td>
                    <td class="confirm-table-td">{{$manage_shop->image_url}}</td>
                </tr>
            </table>
        </div>
        <span class="shop-info-change"></span>
        <div class="shop-info-after">
            <p class="shop-after-title">変更後</p>
            <table class="shop-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Shop name</td>
                    <td class="confirm-table-td" id="shop_name_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Prefecture</td>
                    <td class="confirm-table-td" id="prefecture_id_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Genre</td>
                    <td class="confirm-table-td" id="genre_id_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Shop Introduction</td>
                    <td class="confirm-table-td" id="shop_detail_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-title">Shop Image URL</td>
                    <td class="confirm-table-td" id="image_url_confirm"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="{{ mix('js/shop_edit.js') }}"></script>

@endsection