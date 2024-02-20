@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/evaluate_new.css') }}">
@endsection

@section('content')

<div class="shop-evaluate-new">
    <div class="shop-detail">
        <h1 class="shop-detail-title">今回のご利用はいかがでしたか？</h1>
        <div class="shop">
            <img class="shop-img" src="{{ $shop_detail->image_url }}">
            <span class="shop-name">{{ $shop_detail->shop_name }}</span>
            <span class="shop-evaluate"></span>
            <div class="shop-info">
                <span class="shop-pref">
                    #{{ $shop_detail->prefecture->pref_name }}
                </span>
                <span class="shop-genre">
                    #{{ $shop_detail->genre->genre_name }}
                </span>
            </div>
            <div class="shop-button">
                <button class="shop-detail-button">
                    <a class="shop-detail-link" href="{{ route('reserve.index', ['shop_id' => $shop_detail->id]) }}">詳しく見る</a>
                </button>
                @if (Auth::guard('web')->check())
                <div class="like">
                    @if($shop_detail->is_liked())
                    <a class="unlike-link" href="{{ route('unlike', ['shop_id' => $shop_detail->id]) }}"></a>
                    @else
                    <a class="like-link" href="{{ route('like', ['shop_id' => $shop_detail->id]) }}"></a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
    <form class="create-form" enctype="multipart/form-data" action="{{ route('evaluate.create', ['shop_id' => $shop_detail->id] )}}" method="post">
        @csrf
        <div class="create-form-content">
            <div class="form-star">
                <p class="form-star-title">体験を評価してください</p>
                <div class="form-star-group">
                    <span class="star" id="1">★</span>
                    <span class="star" id="2">★</span>
                    <span class="star" id="3">★</span>
                    <span class="star" id="4">★</span>
                    <span class="star" id="5">★</span>
                </div>
                <div class="form-error-stars">
                    @error('star_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-comment">
                <p class="form-comment-title">口コミを投稿</p>
                <textarea class="form-comment-textarea" name="comments" id="comments" cols="30" rows="10" placeholder="カジュアルな夜のお出かけにおすすめのスポット"></textarea>
                <div class="counter">
                    <label><span id="charCounting">0</span>/400（最高文字数）</label>
                </div>
                <div class="form-error-shop">
                    @error('comments')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-image">
                <p class="form-image-title">画像の追加</p>
                <div class="form-image-content">
                    <p class="form-image-text">クリックして写真を追加<br>またはドラッグアンドドロップ</p>
                    <input class="input-files" type="file" name="upload_file">
                </div>
                <div class="form-error-image">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <button class="information-create-button" type="submit">口コミを投稿</button>
    </form>
</div>

<script src="{{ mix('js/star.js') }}"></script>
<script src="{{ mix('js/count.js') }}"></script>

@endsection