@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/qr_code.css') }}">
@endsection

@section('content')

<div class="qr-code-reader">
    <div class="qr-code-reader-title">
        <button class="shop-manager-home-button"><a class="shop-manager-home-link" href="/shop_manager"><</a></button>
        <h1 class="qr-code-reader-title-text">QRコードリーダー</h1>
    </div>
    <p class="qr-code-text">予約完了時に発行されたQRコードをカメラにかざしてください</p>
    <script>
        let capture;

        function setup() {
            pixelDensity(1);
            createCanvas(280, 240);
            capture = createCapture(VIDEO);
            capture.size(280, 200);
            capture.hide();
        }

        function draw() {
            background(0);
            image(capture, 0, 0);

            capture.loadPixels();
            const code = jsQR(capture.pixels, capture.width, capture.height, {
                inversionAttempts: "dontInvert"
            });
            fill(255);
            textSize(16);
            textAlign(CENTER);
            if (code) {
                text(`QRコードのデータ: ${code.data}`, width / 2, height / 1.05);
            } else {
                text(`QRコードが見つかりません`, width / 2, height / 1.05);
            }
        }
    </script>
</div>

<script src="https://cdn.jsdelivr.net/npm/p5@1.4.0/lib/p5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>

@endsection