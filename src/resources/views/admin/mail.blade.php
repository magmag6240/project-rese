@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/mail.css') }}">
@endsection

@section('content')

<div class="mail-form">
    <h2 class="mail-form-title">新規メール作成</h2>
    <form class="form" action="{{route('admin.mail.send')}}" method="post">
        <div class="form-group">
            <span class="form-group-title">ユーザー</span>
            <label class="user-select-area">
                @foreach($users as $user)
                <input type="checkbox" id="checkbox" value="{{$user->email}}">{{$user->name}}
                @endforeach
            </label>
        </div>
        <div class="form-group">
            <span class="form-group-title">メールアドレス</span>
            <div class="form-email" id="email"></div>
        </div>
        <div class="form-group">
            <span class="form-group-title">お知らせ内容</span>
            <textarea name="content" placeholder="利用者へ情報発信"></textarea>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">送信</button>
        </div>
    </form>
</div>
<script src="{{ mix('js/mail.js') }}"></script>

@endsection