<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluateRequest;
use App\Models\Evaluation;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\Star;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index($shop_id)
    {
        $shop_detail = Shop::where('id', $shop_id)->with('prefecture', 'genre')->first();
        $stars = Star::all();
        $reserve_shops = Reservation::with('shop')->where('user_id', Auth::id())->get();
        return view('general/evaluate_new', compact('stars', 'reserve_shops', 'shop_detail'));
    }

    public function create(EvaluateRequest $request)
    {
        Evaluation::create([
            'user_id' => Auth::id(),
            'shop_id' => $request->input('shop_id'),
            'star_id' => $request->input('star_id'),
            'comments' => $request->input('comments')
        ]);
        return view('general/evaluate_done');
    }
}
