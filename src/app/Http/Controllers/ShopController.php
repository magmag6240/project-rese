<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
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

        if (!empty($select_area)) {
            $query->where('prefecture_id', 'LIKE', $select_area);
        }

        if (!empty($select_genre)) {
            $query->where('genre_id', 'LIKE', $select_genre);
        }

        if (!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
        }

        $items = $query->with('prefecture', 'genre', 'evaluations')->get();

        return view('general/shop_list', compact('prefectures', 'genres', 'items', 'select_area', 'select_genre', 'keyword'));
    }

    public function evaluate($shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        $evaluate = Evaluation::with('star')->where('shop_id', $shop_id)->paginate(2);
        $evaluate_star = Evaluation::with('star')->where('shop_id', $shop_id)->pluck('star_id')->avg();

        if(is_null($evaluate_star)){
            return view('general/shop_evaluate_null', compact('shop'));
        }

        if(!is_null($evaluate_star)){
            return view('general/shop_evaluate', compact('shop', 'evaluate', 'evaluate_star'));
        }
    }
}
