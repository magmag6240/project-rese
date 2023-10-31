@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_list.css') }}">
@endsection

@section('content')

<div class="shop-list">
    <div class="shop-list-search">
        <form class="search-form" action="{{ route('shop.index') }}" method="get">
            @csrf
            <label class="select-area">
                <select class="search-area" id="search_area" name="area">
                    <option value="">All area</option>
                    @foreach($prefectures as $pref)
                    <option value="{{ $pref->id }}">{{ $pref->pref_name }}</option>
                    @endforeach
                </select>
            </label>
            <label class="select-genre">
                <select class="search-genre" id="search_genre" name="genre">
                    <option value="">All genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                    @endforeach
                </select>
            </label>
            <button class="search-button"></button>
            <input class="search-keyword" name="keyword" type="search" placeholder="Search ...">
        </form>
    </div>
    <div class="shop-lineup">
        @foreach($items as $item)
        <div class="shop">
            <img class="shop-img" src="{{ $item->image_url }}">
            <span class="shop-name">{{ $item->shop_name }}</span>
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
                <div class="like">
                    @if($item->is_liked())
                    <a class="unlike-link" href="{{ route('unlike', ['shop_id' => $item->id]) }}"></a>
                    @else
                    <a class="like-link" href="{{ route('like', ['shop_id' => $item->id]) }}"></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection