<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function store()
    {
        $reserve_confirm = Reservation::where('user_id', Auth::id())->latest()->first();
        $menu_data = Menu::where('id', $reserve_confirm->menu_id)->first();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Charge::create(array(
            'amount' => $reserve_confirm->number * $menu_data->price,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));
        return view('general/done');
    }
}
