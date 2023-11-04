@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/update.css') }}">
@endsection

@section('content')

<div class="admin-new">
    <h1 class="admin-update-title">店舗代表者 登録</h1>
    <form class="update-form" action="{{route('admin.update')}}" method="post">
        @method('patch')
        @csrf
        <table class="update-form-table">
            <tr class="update-form-table-tr">
                <td class="update-table-title">User name</td>
                <td class="update-table-td">
                    <label class="user-select">
                        <select class="user" id="user" name="user">
                            <option value="">select user</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </td>
            </tr>
            <tr class="update-form-table-tr">
                <td class="update-table-title">Role</td>
                <td class="update-table-td">
                    <input class="role" type="text" name="role" id="role" value="shop_manager">
                </td>
            </tr>
        </table>
        <button class="information-update-button" type="submit">代表者登録</button>
    </form>
</div>

@endsection