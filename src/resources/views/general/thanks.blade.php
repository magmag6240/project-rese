@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/thanks.css') }}">
@endsection

@section('content')

<div class="thanks">
    <p class="thanks-text">会員登録ありがとうございます</p>
    <form class="logout-form" action="/logout" method="post">
        @csrf
        <button class="logout-button" type="submit">ログインする</button>
    </form>
</div>

@endsection