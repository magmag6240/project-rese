@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_manager_home.css') }}">
@endsection

@section('content')

<div class="store-manager-home">
    <p class="user-name">{{$user}}さん、お疲れ様です。</p>
    <div class="store-manage-page-list">
        <div class="page-group">
            <a class="store-manage-link" href="/store_manager/new">店舗情報 新規作成</a>
            <p class="store-manage-text">アプリケーションに掲載する店舗情報を作成することができます。</p>
        </div>
        <div class="page-group">
            <a class="store-manage-link" href="/store_manager/edit">店舗情報 更新・変更</a>
            <p class="store-manage-text">アプリケーションに掲載中の店舗情報を更新・変更することができます。</p>
        </div>
        <div class="page-group">
            <a class="store-manage-link" href="/store_manager/reserve_list">店舗予約 スケジュール</a>
            <p class="store-manage-text">アプリケーションに掲載中の店舗への予約情報を確認できます。</p>
        </div>
    </div>
</div>

@endsection