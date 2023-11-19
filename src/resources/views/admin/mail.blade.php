@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/mail.css') }}">
@endsection

@section('content')

<div class="admin-mail-form">
    <div class="admin-mail-form-title">
        <button class="admin-home-button"><a class="admin-home-link" href="/admin"><</a></button>
        <h1 class="admin-mail-form-title-text">メール新規作成</h1>
    </div>
    <form class="form" action="{{route('admin.mail.send')}}" method="post">
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