<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Shop;
use App\Models\Sort;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $kind_of_sort = Sort::all();
        $prefectures = Prefecture::all();
        $genres = Genre::all();

        $select_area = $request->input('area');
        $select_genre = $request->input('genre');
        $select_sort = $request->input('sort');
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

        if (!empty($select_sort)) {
            switch ($select_sort) {
                case '1':
                    $items = $query->inRandomOrder();
                    break;
                case '2':
                    $query->orderByDesc('star_score')->get();
                    break;
                case '3':
                    $query->orderByRaw('star_score is null asc')->orderBy('star_score', 'asc')->get();
                    break;
                default:
                    $items = $query->with('prefecture', 'genre', 'evaluations')->get();
                    break;
            }
        }

        $items = $query->with('prefecture', 'genre', 'evaluations')->get();

        return view('general/shop_list', compact('prefectures', 'genres', 'select_area', 'select_genre', 'keyword', 'items', 'kind_of_sort'));
    }
}
