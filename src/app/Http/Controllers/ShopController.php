<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Shop;

class ShopController extends Controller
{
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

        return view('general/shop_list', compact('prefectures', 'genres', 'items', 'select_area', 'select_genre', 'keyword'));
    }
}
