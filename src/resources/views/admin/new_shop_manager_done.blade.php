@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/new_shop_manager_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">店舗代表者登録メールが送信されました</p>
    <button class="admin-home-button" type="button"><a class="admin-home-link" href="/admin">戻る</a></button>
</div>

@endsection