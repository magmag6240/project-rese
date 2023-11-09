<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));
        return back();

    }
}
