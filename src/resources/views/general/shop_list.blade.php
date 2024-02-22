@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/shop_list.css') }}">
@endsection

@section('content')

<div class="shop-list">
    <div class="shop-list-search">
        <form class="search-form" action="{{ route('shop.index') }}" method="get">
            @csrf
            <label class="select-sort-label">
                <select class="select-sort-select" id="sort" name="sort">
                    <option value="">並び替え</option>
                    @foreach($kind_of_sort as $sort)
                    <option value="{{ $sort->id }}">{{ $sort->kind_of_sort }}</option>
                    @endforeach
                </select>
            </label>
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
            <span class="shop-evaluate">{{ $item->star_score }}</span>
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