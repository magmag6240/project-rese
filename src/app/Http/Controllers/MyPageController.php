<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Reservation;
use Carbon\Carbon;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
        $reserve_shops_from_now_on = Reservation::with('shop')->where('user_id', $user_id)->whereDate('reserve_date', '>=', $today)->get();
        $reserve_shops_history = Reservation::with('shop')->where('user_id', $user_id)->whereDate('reserve_date', '<', $yesterday)->paginate(1, ['*'], 'reserve_date');
        $like_shops = Like::with('shop')->where('user_id', $user_id)->get();

        return view('general/mypage', compact('user', 'like_shops', 'reserve_shops_from_now_on', 'reserve_shops_history'));
    }
}