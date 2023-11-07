<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Menu;
use App\Models\Prefecture;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopManagerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('shop_manager/home', compact('user'));
    }

    public function new()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('shop_manager/create', compact('prefectures', 'genres'));
    }

    public function store(Request $request)
    {
        Shop::create([
            'shop_name' => $request->input('name'),
            'user_id' => Auth::id(),
            'prefecture_id' => $request->input('area'),
            'genre_id' =>$request->input('genre'),
            'shop_detail' => $request->input('shop_detail'),
            'image_url' => $request->input('shop_image_url')
        ]);
        return view('shop_manager/create_done');
    }

    public function shop_list()
    {
        $user_id = Auth::id();
        $shops = Shop::with('prefecture', 'genre')->where('user_id', $user_id)->paginate(5);
        return view('shop_manager/shop_list', compact('shops'));
    }

    public function edit($shop_id)
    {
        $user_id = Auth::id();
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        $manage_shop = Shop::with('prefecture', 'genre')->where('id', $shop_id)->first();
        return view('shop_manager/edit', compact('prefectures', 'genres', 'manage_shop'));
    }

    public function update(Request $request, $shop_id)
    {
        $shop_edit = $request->only(['shop_name', 'prefecture_id', 'genre_id', 'shop_detail', 'image_url']);
        Shop::find($shop_id)->update($shop_edit);
        return view('shop_manager/edit_done');
    }

    public function reserve_list($shop_id)
    {
        $reserves = Reservation::with('user')->where('shop_id', $shop_id)->paginate(5);
        return view('shop_manager/reserve_list', compact('reserves'));
    }

    public function menu_new($shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        return view('shop_manager/menu_create', compact('shop'));
    }

    public function menu_store(Request $request, $shop_id)
    {
        Menu::create([
            'shop_id' => $shop_id,
            'menu_name' => $request->input('name'),
            'price' => $request->input('price'),
            'menu_detail' => $request->input('menu_detail')
        ]);
        return view('shop_manager/menu_create_done');
    }

    public function menu_edit($shop_id)
    {
        $user_id = Auth::id();
        $shop = Shop::where('id', $shop_id)->first();
        $menu = Menu::where('shop_id', $shop_id)->get();
        return view('shop_manager/menu_edit', compact('shop', 'menu'));
    }

    public function menu_update(Request $request, $shop_id)
    {
        $shop_edit = $request->only(['menu_name', 'shop_id', 'price']);
        Menu::find($shop_id)->update($shop_edit);
        return view('shop_manager/menu_edit_done');
    }
}