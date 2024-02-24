@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/shop_list.css') }}">
@endsection

@section('content')

<div class="shop-list">
    <div class="shop-lineup">
        @foreach($items as $item)
        <div class="shop">
            <img class="shop-img" src="{{ $item->image_url }}">
            <span class="shop-name">{{ $item->shop_name }}</span>
            @if(empty($item->star_score))
            <span class="shop-evaluate">---</span>
            @else
            <span class="shop-evaluate">{{ $item->star_score }}</span>
            @endif
            <div class="shop-info">
                <span class="shop-pref">
                    #{{ $item->prefecture->pref_name }}
                </span>
                <span class="shop-genre">
                    #{{ $item->genre->genre_name }}
                </span>
            </div>
            <div class="shop-button">
                <button class="shop-detail-button">
                    <a class="shop-detail-link" href="{{ route('reserve.index', ['shop_id' => $item->id]) }}">詳しく見る</a>
                </button>
                @if (Auth::guard('web')->check())
                <div class="like">
                    @if($item->is_liked())
                    <a class="unlike-link" href="{{ route('unlike', ['shop_id' => $item->id]) }}"></a>
                    @else
                    <a class="like-link" href="{{ route('like', ['shop_id' => $item->id]) }}"></a>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="{{ mix('js/sort.js') }}"></script>

@endsection