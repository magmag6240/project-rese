@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/new_shop_manager.css') }}">
@endsection

@section('content')

<div class="admin-new-shop-manager">
    <div class="admin-new-shop-manager-title">
        <button class="admin-home-button"><a class="admin-home-link" href="/admin"><</a></button>
        <h1 class="admin-new-shop-manager-title-text">店舗代表者 登録用メール作成</h1>
    </div>
    <form class="new-shop-manager-mail-form" action="{{route('admin.new_shop_manager.mail')}}" method="post">
        @csrf
        <div class="mail-address">
            <span class="form-title">送信先メールアドレス</span>
            <input class="form-input" type="email" name="email" id="email">
        </div>
        <button class="form-submit-button" type="submit">送信</button>
    </form>
</div>

@endsection