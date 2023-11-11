<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index()
    {
        $stars = Star::all();
        return view('general/evaluate_new', compact('stars'));
    }

    public function create(Request $request, $shop_id)
    {
        Evaluation::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop_id,
            'stars_id' => $request->input('stars'),
            'comments' => $request->input('comments')
        ]);
        return view('general/evaluate_done');
    }
}
