@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/shop_evaluate.css') }}">
@endsection

@section('content')

<div class="shop-detail">
    <div class="shop-detail-contents">
        <div class="shop-detail-title">
            <button class="shop-list-button"><a class="shop-list-link" href="/"><</a></button>
            <span class="shop-name">{{$shop->shop_name}}</span>
            <span class="shop-avg">{{$evaluate_star}}</span>
        </div>
        <div class="shop-detail-info">
            <img class="shop-img" src="{{$shop->image_url}}">
            <div class="shop-area-genre">
                <span class="shop-pref">#{{$shop->prefecture->pref_name}}</span>
                <span class="shop-genre">#{{$shop->genre->genre_name}}</span>
            </div>
            <p class="shop-text">{{$shop->shop_detail}}</p>
        </div>
    </div>
    <div class="shop-evaluate">
        <p class="evaluate-title">評価</p>
        @foreach($evaluate as $data)
        <div class="evaluate-list">
            <span class="evaluate-contents">点数: {{$data->user->name}}</span>
            <span class="evaluate-contents">点数: {{$data->star_id}}/5</span>
            <span class="evaluate-contents">感想: {{$data->comments}}</span>
        </div>
        @endforeach
        <div class="evaluate-paginate">
            {{$evaluate->links('vendor.pagination.evaluate_paginate')}}
        </div>
    </div>
</div>

@endsection