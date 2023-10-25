@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks">
    <p class="thanks-text">会員登録ありがとうございます</p>
    <button class="login-button" type="button"><a class="login-link" href="">ログインする</a></button>
</div>

@endsection