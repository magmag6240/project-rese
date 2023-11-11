@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/qr_code.css') }}">
@endsection

@section('content')

<div class="qr-code-reader">
    <h1>QRコードリーダー</h1>
    <p>予約完了時に発行されたQRコードをカメラにかざしてください</p>
    <div class="qr-code" id="wrapper">
        <video id="video" autoplay muted playsinline></video>
        <canvas id="camera-canvas"></canvas>
        <canvas id="rect-canvas"></canvas>
        <span id="qr-msg">QRコード: 見つかりません</span>
    </div>
</div>

<script src="{{ mix('js/jsQR.js') }}"></script>
<script src="{{ mix('js/camera.js') }}"></script>
@endsection