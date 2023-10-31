<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $user_id = Auth::id();
        Like::create([
            'shop_id' => $id,
            'user_id' => $user_id,
        ]);
        return redirect()->back();
    }

    public function unlike($id)
    {
        $user_id = Auth::id();
        $like = Like::where('shop_id', $id)->where('user_id', $user_id)->first();
        $like->delete();

        return redirect()->back();
    }
}
