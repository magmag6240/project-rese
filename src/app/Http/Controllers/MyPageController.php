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
        $like_shops = Like::with('user', 'shop')->where('user_id', $user_id)->get();
        $reserve_shops = Reservation::where('user_id', $user->id)->get();

        return view('mypage', compact('user', 'like_shops', 'reserve_shops'));
    }
}