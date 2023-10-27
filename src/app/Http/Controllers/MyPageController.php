<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $like_shops = Like::with('user', 'shop')->where('user_id', $user_id)->get();

        if (is_null($like_shops)) {

            return view('mypage')->with('message', 'お気に入り店は登録されていません');
        } else {

            return view('mypage', compact('user', 'like_shops'));
        }
    }
}