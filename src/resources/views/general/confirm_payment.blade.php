@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general/confirm_payment.css') }}">
@endsection

@section('content')

<div class="confirm-payment">
    <p class="confirm-title">コースプラン 事前決済確認</p>
    <span class="confirm-text">コースプランを選択された場合、コースプラン分の金額は事前決済となります。</span>
    <span class="confirm-text">選択したコース名ならびに合計金額をご確認の上、決済ページへお進みください。</span>
    <div class="reserve-confirm">
        <table class="reserve-confirm-table">
            <tr class="confirm-table-tr">
                <td class="confirm-table-td">Number</td>
                <td class="confirm-table-td">{{$reserve_confirm->number}}人</td>
            </tr>
            <tr class="confirm-table-tr">
                <td class="confirm-table-td">Menu Name</td>
                <td class="confirm-table-td">{{$menu_data->menu_name}}</td>
            </tr>
            <tr class="confirm-table-tr">
                <td class="confirm-table-td">Menu Price</td>
                <td class="confirm-table-td">￥{{$menu_data->price}}</td>
            </tr>
            <tr class="confirm-table-tr">
                <td class="confirm-table-td">Total Amount</td>
                <td class="confirm-table-td">￥{{$reserve_confirm->number * $menu_data->price}}</td>
            </tr>
        </table>
    </div>
    <form class="stripe-form" action="{{route('stripe.store')}}" method="post">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="{{$reserve_confirm->number * $menu_data->price}}"
            data-name="お支払い画面"
            data-label="決済"
            data-description="現在はデモ画面です"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</div>

@endsection