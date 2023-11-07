@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/edit.css') }}">
@endsection

@section('content')

<div class="shop-info-edit">
    <div class="shop-edit-confirm">
        <div class="shop-info-before">
            <p class="shop-before-title">変更前</p>
            <table class="shop-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop name</td>
                    <td class="confirm-table-td">{{$manage_shop->shop_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Prefecture</td>
                    <td class="confirm-table-td">{{$manage_shop->prefecture->pref_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Genre</td>
                    <td class="confirm-table-td">{{$manage_shop->genre->genre_name}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop Introduction</td>
                    <td class="confirm-table-td">{{$manage_shop->shop_detail}}</td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop Image URL</td>
                    <td class="confirm-table-td">{{$manage_shop->image_url}}</td>
                </tr>
            </table>
        </div>
        <span class="shop-info-change"></span>
        <div class="shop-info-after">
            <p class="shop-after-title">変更後</p>
            <table class="shop-confirm-table">
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop name</td>
                    <td class="confirm-table-td" id="shop_name_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Prefecture</td>
                    <td class="confirm-table-td" id="area_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Genre</td>
                    <td class="confirm-table-td" id="genre_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop Introduction</td>
                    <td class="confirm-table-td" id="shop_detail_confirm"></td>
                </tr>
                <tr class="confirm-table-tr">
                    <td class="confirm-table-td">Shop Image URL</td>
                    <td class="confirm-table-td" id="image_url_confirm"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="shop-edit-contents">
        <h1 class="shop-edit-title">予約内容編集</h1>
        <form class="edit-form" action="{{ route('shop_manager.update', $manage_shop->id) }}" method="post">
            @method('patch')
            @csrf
            <table class="edit-form-table">
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Shop name</td>
                    <td class="edit-table-td">
                        <input class="shop-name" type="text" name="name" id="shop_name">
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Prefecture</td>
                    <td class="edit-table-td">
                        <label class="shop-select-area">
                            <select class="shop-area" id="area" name="prefecture_id">
                                <option value="">select area</option>
                                @foreach($prefectures as $pref)
                                <option value="{{ $pref->id }}">{{ $pref->pref_name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Genre</td>
                    <td class="edit-table-td">
                        <label class="shop-select-genre">
                            <select class="shop-genre" id="genre" name="genre_id">
                                <option value="">select genre</option>
                                @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Shop Introduction</td>
                    <td class="edit-table-td">
                        <textarea class="shop-detail" name="shop_detail" id="shop_detail" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr class="edit-form-table-tr">
                    <td class="edit-table-title">Shop Image URL</td>
                    <td class="edit-table-td">
                        <input class="shop-image-url" type="url" name="image_url" id="image_url">
                    </td>
                </tr>
            </table>
            <button class="information-update-button" type="submit">変更</button>
        </form>
    </div>
</div>
<script src="{{ mix('js/shop_edit.js') }}"></script>

@endsection