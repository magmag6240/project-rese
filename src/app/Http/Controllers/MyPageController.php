<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $prefectures = Prefecture::all();
        $user_id = Auth::id();
        $like_shops_id = Like::where('user_id', $user_id)->pluck('shop_id');
        $like_shops_details = Shop::with('prefecture', 'genre')->where('id', $like_shops_id)->get();

        return view('mypage', compact('prefectures', 'like_shops_details'));
    }
}