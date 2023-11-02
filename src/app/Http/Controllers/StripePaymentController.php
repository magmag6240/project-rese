<?php

namespace App\Http\Controllers;

use App\Http\Requests\StripeRequest;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{

    public function store(StripeRequest $request)
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
