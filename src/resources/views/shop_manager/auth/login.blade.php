@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="login-content">
    <div class="login-title">Login</div>
    <form class="login-form" action="/shop_manager/login" method="post">
        @csrf
        <div class="form-group">
            <div class="form-mail">
                <span class="mail-icon"></span>
                <input class="form-input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            @if ($errors->any())
            <div class="login-error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="form-group">
            <div class="form-password">
                <span class="password-icon"></span>
                <input class="form-input" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
            </div>
            @if ($errors->any())
            <div class="login-error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection