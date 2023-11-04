<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Reservation;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $reserve_shops = Reservation::with('shop')->where('user_id', $user_id)->get();
        $like_shops = Like::with('shop')->where('user_id', $user_id)->get();

        return view('general/mypage', compact('user', 'like_shops', 'reserve_shops'));
    }
}