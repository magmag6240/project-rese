@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/evaluate_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">貴重なご意見ありがとうございました</p>
    <button class="home-button" type="button"><a class="home-link" href="/">ホームへ戻る</a></button>
</div>

@endsection