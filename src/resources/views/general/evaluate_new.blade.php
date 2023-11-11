@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/evaluate_new.css') }}">
@endsection

@section('content')

<div class="shop-evaluate-new">
    <h1 class="shop-evaluate-new-title">店舗評価 投稿</h1>
    <form class="create-form" action="{{route('evaluate.create')}}" method="post">
        @csrf
        <table class="create-form-table">
            <tr class="create-form-table-tr">
                <td class="create-table-title">Stars</td>
                <td class="create-table-td">
                    <label class="select-star">
                        <select class="evaluate-star" id="star" name="star">
                            <option value="">Select stars</option>
                            @foreach($stars as $star)
                            <option value="{{ $star->id }}">{{ $star->stars }}</option>
                            @endforeach
                        </select>
                    </label>
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Title</td>
                <td class="create-table-td">
                    <input class="title" type="text" name="title" id="title">
                </td>
            </tr>
            <tr class="create-form-table-tr">
                <td class="create-table-title">Comments</td>
                <td class="create-table-td">
                    <textarea class="comments" name="comments" id="comments" cols="30" rows="10"></textarea>
                </td>
            </tr>
        </table>
        <button class="information-create-button" type="submit">投稿</button>
    </form>
</div>

@endsection