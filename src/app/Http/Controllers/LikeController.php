<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($shop_id)
    {
        Like::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop_id
        ]);
        return redirect()->back();
    }

    public function unlike($shop_id)
    {
        $user_id = Auth::id();
        $like = Like::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        $like->delete();
        return redirect()->back();
    }
}
