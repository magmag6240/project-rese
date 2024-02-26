@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/shop/create_csv.css') }}">
@endsection

@section('content')

<div class="shop-manager-csv-content">
    <div class="shop-create-title">
        <button class="shop-manager-button" type="button"><a class="shop-manager-home-link" href="/shop_manager"><</a></button>
        <h1 class="shop-create-title-text">登録店舗情報 新規作成</h1>
    </div>
    <form class="create-form" action="{{ route('shop_manager.csv.post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input class="file-input" type="file" name="file" id="file">
        <button class="information-create-button" type="submit">新規作成</button>
    </form>
    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
</div>

@endsection