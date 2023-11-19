@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="register-content">
    <div class="register-title">Registration</div>
    <form class="register-form" action="/shop_manager/register" method="post">
        @csrf
        <div class="form-group">
            <div class="form-name">
                <span class="name-icon"></span>
                <input class="form-input" type="text" name="name" placeholder="Username" value="{{ old('name') }}">
            </div>
            @if ($errors->any())
            <div class="register-error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="form-group">
            <div class="form-mail">
                <span class="mail-icon"></span>
                <input class="form-input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            @if ($errors->any())
            <div class="register-error">
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
            <div class="register-error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection