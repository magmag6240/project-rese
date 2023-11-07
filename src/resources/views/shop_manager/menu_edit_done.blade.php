@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/menu_edit_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">コースプランを更新しました</p>
    <button class="home-button" type="button"><a class="home-link" href="/shop_manager">戻る</a></button>
</div>

@endsection