@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager/mail.css') }}">
@endsection

@section('content')

<div class="mail-form">
    <div class="mail-form-title">
        <button class="shop-manager-button" type="button"><a class="shop-manager-home-link" href="/shop_manager"><</a></button>
        <h1 class="mail-form-title-text">新規メール作成</h1>
    </div>
    <form class="form" method="post" action="{{ route('shop_manager.mail.send') }}">
        @csrf
        <table class="form-table">
            <tr class="form-table-tr">
                <td class="form-table-title">メール内容</td>
                <td class="form-table-td">
                    <textarea class="form-textarea" name="contents" id="contents" cols="30" rows="20" placeholder="Message"></textarea>
                </td>
            </tr>
        </table>
        <button class="form-button-submit" type="submit">送信</button>
    </form>
</div>

@endsection