@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/mail.css') }}">
@endsection

@section('content')

<div class="mail-form">
    <h2 class="mail-form-title">新規メール作成</h2>
    <form class="form" action="{{route('shop_manager.mail.send')}}" method="post">
        @csrf
        <div class="form-group">
            <span class="form-group-title">送信先ユーザー</span>
            @foreach($data as $data)
            <div>{{$data->email}}</div>
            @endforeach
        </div>
        <div class="form-group">
            <span class="form-group-title">お知らせ内容</span>
            <textarea name="information" id="information" cols="30" rows="10">
                @yield('information')
            </textarea>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">送信</button>
        </div>
    </form>
</div>

@endsection