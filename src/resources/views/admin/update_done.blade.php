@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/update_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">店舗代表者として登録されました</p>
    <button class="home-button" type="button"><a class="home-link" href="/admin">戻る</a></button>
</div>

@endsection