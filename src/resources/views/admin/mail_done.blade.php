@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/mail_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">メールが送信されました</p>
    <button class="admin-home-button" type="button"><a class="admin-home-link" href="/admin">戻る</a></button>
</div>

@endsection