@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection

@section('content')

<div class="admin-home">
    <p class="user-name">{{$user->name}}さん、お疲れ様です。</p>
    <div class="admin-page-list">
        <div class="page-group">
            <button class="page-group-button">
                <a class="new-link" href="{{ route('admin.new_shop_manager') }}">店舗代表者 登録用メール作成</a>
            </button>
            <p class="admin-text">店舗代表者の登録用メールを送信する</p>
        </div>
        <div class="page-group">
            <button class="page-group-button">
                <a class="shop-manager-list-link" href="{{ route('admin.show') }}">店舗代表者一覧</a>
            </button>
            <p class="admin-text">掲載中の店舗の代表者情報を閲覧する</p>
        </div>
        <div class="page-group">
            <button class="page-group-button">
                <a class="mail-link" href="{{ route('admin.mail.index') }}">メールフォーム</a>
            </button>
            <p class="admin-text">利用者へEmailを送信する</p>
        </div>
    </div>
</div>

@endsection