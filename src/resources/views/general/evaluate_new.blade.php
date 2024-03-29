@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/evaluate_new.css') }}">
@endsection

@section('content')

<div class="shop-evaluate-new">
    <form class="create-form" enctype="multipart/form-data" action="{{ route('evaluate.create', ['shop_id' => $shop_detail->id] )}}" method="post">
        @csrf
        <div class="create-form-content">
            <div class="shop-detail">
                <h1 class="shop-detail-title">今回のご利用はいかがでしたか？</h1>
                <div class="shop">
                    <img class="shop-img" src="{{ $shop_detail->image_url }}">
                    <span class="shop-name">{{ $shop_detail->shop_name }}</span>
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
            <div class="form-edit">
                <div class="form-star">
                    <p class="form-star-title">体験を評価してください</p>
                    <div class="form-star-group">
                        <input class="star-input" type="radio" id="star_5" name="star_id" value="5" {{ old('star_id') == '5' ? 'checked' : '' }}>
                        <label class="star-label" for="star_5">★</label>
                        <input class="star-input" type="radio" id="star_4" name="star_id" value="4" {{ old('star_id') == '4' ? 'checked' : '' }}>
                        <label class="star-label" for="star_4">★</label>
                        <input class="star-input" type="radio" id="star_3" name="star_id" value="3" {{ old('star_id') == '3' ? 'checked' : '' }}>
                        <label class="star-label" for="star_3">★</label>
                        <input class="star-input" type="radio" id="star_2" name="star_id" value="2" {{ old('star_id') == '2' ? 'checked' : '' }}>
                        <label class="star-label" for="star_2">★</label>
                        <input class="star-input" type="radio" id="star_1" name="star_id" value="1" {{ old('star_id') == '1' ? 'checked' : '' }}>
                        <label class="star-label" for="star_1">★</label>
                    </div>
                    <div class="form-error-stars">
                        @error('star_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-comment">
                    <p class="form-comment-title">口コミを投稿</p>
                    <textarea class="form-comment-textarea" name="comments" id="comments" cols="30" rows="7" placeholder="カジュアルな夜のお出かけにおすすめのスポット">{{ old('comments') }}</textarea>
                    <div class="counter">
                        <label><span class="counter-display" id="charCounting">0</span>/400（最高文字数）</label>
                    </div>
                    <div class="form-error-comments">
                        @error('comments')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-image">
                    <p class="form-image-title">画像の追加</p>
                    <div class="form-image-content">
                        <p class="form-image-text" id="text">クリックして写真を追加<br>
                            <span class="form-image-text-span">またはドラッグアンドドロップ</span>
                        </p>
                        <div class="image-preview"></div>
                        <input class="input-files" type="file" id="image" name="image_url" value="{{ old('image_url') }}">
                    </div>
                    <div class="form-error-image">
                        @error('image_url')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button class="evaluate-create-button" type="submit">口コミを投稿</button>
    </form>
</div>

<script src="{{ mix('js/count.js') }}"></script>
<script src="{{ mix('js/image_create.js') }}"></script>

@endsection