@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_manager_home.css') }}">
@endsection

@section('content')

<div class="store-manager-home">
    <div class="store-manage-page">
        <div class="page-group">
            <a class="store-manage-link" href="/store_manager/new">店舗情報 新規作成</a>
            <p class="store-manage-text">アプリケーションに掲載する店舗情報を作成することができます。</p>
        </div>
        <div class="page-group">
            <a class="store-manage-link" href="/store_manager/change">店舗情報 更新・変更</a>
            <p class="store-manage-text">アプリケーションに掲載中の店舗情報を更新・変更することができます。</p>
        </div>
        <div class="page-group">
            <a class="store-manage-link" href="/store_manager/reserve">店舗予約 スケジュール</a>
            <p class="store-manage-text">アプリケーションに掲載中の店舗への予約情報を確認できます。</p>
        </div>
    </div>
</div>

@endsection