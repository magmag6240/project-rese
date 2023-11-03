@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_manager_home.css') }}">
@endsection

@section('content')

<div class="store-manager-home">
    <p class="user-name">{{$user->name}}さん、お疲れ様です。</p>
    <div class="store-manage-page-list">
        <div class="page-group">
            <button class="page-group-button"><a class="store-manage-link" href="{{ route('store_manager.new') }}">店舗情報 新規作成</a></button>
            <p class="store-manage-text">掲載する店舗の情報を入力し、店舗ページを作成することができます。</p>
        </div>
        <div class="page-group">
            <button class="page-group-button"><a class="store-manage-link" href="{{ route('store_manager.edit') }}">店舗情報 更新・変更</a></button>
            <p class="store-manage-text">掲載中の店舗情報を更新・変更することができます。</p>
        </div>
        <div class="page-group">
            <button class="page-group-button"><a class="store-manage-link" href="{{ route('store_manager.reserve_list') }}">店舗予約 スケジュール</a></button>
            <p class="store-manage-text">掲載中の店舗の予約情報を確認することができます。</p>
        </div>
    </div>
</div>

@endsection