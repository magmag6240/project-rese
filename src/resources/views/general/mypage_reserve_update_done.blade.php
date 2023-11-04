@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/reserve_update_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">予約情報の変更が完了しました</p>
    <button class="mypage-button" type="button"><a class="mypage-link" href="/mypage">マイページへ戻る</a></button>
</div>

@endsection