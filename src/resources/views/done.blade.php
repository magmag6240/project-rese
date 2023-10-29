@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">ご予約ありがとうございます</p>
    <button class="shop-list-button" type="button"><a class="shop-list-link" href="/">戻る</a></button>
</div>

@endsection