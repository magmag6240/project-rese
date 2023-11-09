@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/home.css') }}">
@endsection

@section('content')

<div class="shop-manager-home">
    <p class="user-name">{{$user->name}}さん、お疲れ様です。</p>
    <div class="shop-manage-page-list">
        <div class="page-group">
            <button class="page-group-button"><a class="shop-manage-link" href="{{ route('shop_manager.new') }}">店舗情報 新規作成</a></button>
            <p class="shop-manage-text">掲載する店舗の情報を入力し、店舗ページを作成する</p>
        </div>
        <div class="page-group">
            <button class="page-group-button"><a class="qr-reader-link" href="{{ route('shop_manager.qr_code') }}">お客様来店時予約照会</a></button>
            <p class="shop-manage-text">お客様来店時、予約完了時に発行されるQRコードを読み取る</p>
        </div>
        <div class="page-group">
            <button class="page-group-button"><a class="shop-manage-link" href="{{ route('shop_manager.shop_list') }}">店舗情報 詳細</a></button>
            <p class="shop-manage-text">掲載中の店舗情報を変更する</p>
            <p class="shop-manage-text">掲載中の店舗のコースプランを登録・編集する</p>
            <p class="shop-manage-text">掲載中の店舗の予約情報を確認する</p>
        </div>
        <div class="page-group">
            <button class="page-group-button">
                <a class="shop-manage-link" href="{{ route('shop_manager.mail.index') }}">メールフォーム</a>
            </button>
            <p class="shop-manage-text">利用者へEmailを送信する</p>
        </div>
    </div>
</div>

@endsection