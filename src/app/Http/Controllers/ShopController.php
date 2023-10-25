<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Like;
use App\Models\Prefecture;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['like', 'unlike']);
    }

    public function index(Request $request)
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();

        $select_area = $request->input('area');
        $select_genre = $request->input('genre');
        $keyword = $request->input('keyword');

        $query = Shop::query();

        if(!empty($select_area)){
            $query->where('prefecture_id', 'LIKE', $select_area);
        }

        if (!empty($select_genre)) {
            $query->where('genre_id', 'LIKE', $select_genre);
        }

        if (!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
        }

        $items = $query->with('prefecture', 'genre')->get();

        return view('shop_list', compact('prefectures', 'genres', 'items', 'select_area', 'select_genre', 'keyword'));
    }

    public function like($id)
    {
        Like::create([
            'shop_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('shop_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }

    public function show($id)
    {
        $shop_detail = Shop::with('prefecture', 'genre')->find($id);

        return view('shop_detail', compact('shop_detail'));
    }
}
