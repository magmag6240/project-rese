@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/qr_code.css') }}">


@endsection

@section('content')

<div class="qr-code-reader">
    <h1>QRコードリーダー</h1>
    <p>予約完了時に発行されたQRコードをカメラにかざしてください</p>
    <div class="qr-code" id="wrapper">
        <div id="msg">Unable to access video stream.</div>
        <canvas id="canvas"></canvas>
    </div>
</div>

<script defer src="{{ mix('js/jsQR.js') }}"></script>
<script src="{{ mix('js/camera.js') }}"></script>
@endsection