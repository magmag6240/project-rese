@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/evaluate_edit.css') }}">
@endsection

@section('content')

<div class="shop-evaluate-edit">
    <form class="edit-form" enctype="multipart/form-data" action="{{ route('evaluate.update', ['evaluation_id' => $evaluation_past->id] )}}" method="post">
        @csrf
        @method('PATCH')
        <div class="edit-form-content">
            <div class="shop-detail">
                <h1 class="shop-detail-title">今回のご利用はいかがでしたか？</h1>
                <div class="shop">
                    <img class="shop-img" src="{{ $evaluation_past->shop->image_url }}">
                    <span class="shop-name">{{ $evaluation_past->shop->shop_name }}</span>
                    <div class="shop-info">
                        <span class="shop-pref">
                            #{{ $evaluation_past->shop->prefecture->pref_name }}
                        </span>
                        <span class="shop-genre">
                            #{{ $evaluation_past->shop->genre->genre_name }}
                        </span>
                    </div>
                    <div class="shop-button">
                        <button class="shop-detail-button">
                            <a class="shop-detail-link" href="{{ route('reserve.index', ['shop_id' => $evaluation_past->shop->id]) }}">詳しく見る</a>
                        </button>
                        @if (Auth::guard('web')->check())
                        <div class="like">
                            @if($evaluation_past->shop->is_liked())
                            <a class="unlike-link" href="{{ route('unlike', ['shop_id' => $evaluation_past->shop->id]) }}"></a>
                            @else
                            <a class="like-link" href="{{ route('like', ['shop_id' => $evaluation_past->shop->id]) }}"></a>
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
                        <input class="star-input" type="radio" id="star_5" name="star_id" value="5" {{ old ('star_id', $evaluation_past->star_id) == '5' ? 'checked' : '' }}>
                        <label class="star-label" for="star_5">★</label>
                        <input class="star-input" type="radio" id="star_4" name="star_id" value="4" {{ old ('star_id', $evaluation_past->star_id) == '4' ? 'checked' : '' }}>
                        <label class="star-label" for="star_4">★</label>
                        <input class="star-input" type="radio" id="star_3" name="star_id" value="3" {{ old ('star_id', $evaluation_past->star_id) == '3' ? 'checked' : '' }}>
                        <label class="star-label" for="star_3">★</label>
                        <input class="star-input" type="radio" id="star_2" name="star_id" value="2" {{ old ('star_id', $evaluation_past->star_id) == '2' ? 'checked' : '' }}>
                        <label class="star-label" for="star_2">★</label>
                        <input class="star-input" type="radio" id="star_1" name="star_id" value="1" {{ old ('star_id', $evaluation_past->star_id) == '1' ? 'checked' : '' }}>
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
                    <textarea class="form-comment-textarea" name="comments" id="comments" cols="30" rows="7" placeholder="カジュアルな夜のお出かけにおすすめのスポット">{{ old('comments', $evaluation_past->comments) }}</textarea>
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
                    <div class="image-past" id="image_past">
                        <p class="image-past-text">前回投稿された画像</p>
                        <img class="image-past-img" src="/storage/evaluations/{{ $evaluation_past->image_url }}" alt="">
                    </div>
                    <div class="form-image-content">
                        <p class="form-image-text" id="text">クリックして写真を追加<br>
                            <span class="form-image-text-span">またはドラッグアンドドロップ</span><br>
                            <span class="form-image-text-span">※投稿時と同じ画像を掲載したい場合、画像を再度アップロードしてください</span>
                        </p>
                        <div class="image-preview"></div>
                        <input class="input-files" type="file" id="image" name="image_url">
                    </div>
                    <div class="form-error-image">
                        @error('image_url')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button class="evaluate-update-button" type="submit">口コミを投稿</button>
    </form>
</div>

<script src="{{ mix('js/count.js') }}"></script>
<script src="{{ mix('js/image.js') }}"></script>

@endsection