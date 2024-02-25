<?php

namespace App\Http\Controllers\ShopManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\ShopRequest;
use App\Models\Genre;
use App\Models\Menu;
use App\Models\Prefecture;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopManagerController extends Controller
{
    public function index()
    {
        $user = Auth::guard('shop_manager')->user();
        $shop = Shop::where('shop_manager_id', Auth::guard('shop_manager')->id())->first();
        $reserve_history = Reservation::where('shop_id', optional($shop)->id)->first();
        return view('shop_manager/home', compact('user', 'shop', 'reserve_history'));
    }

    public function new()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('shop_manager/shop/create', compact('prefectures', 'genres'));
    }

    public function store(ShopRequest $request)
    {
        Shop::create([
            'shop_name' => $request->input('shop_name'),
            'shop_manager_id' => Auth::guard('shop_manager')->id(),
            'prefecture_id' => $request->input('prefecture_id'),
            'genre_id' =>$request->input('genre_id'),
            'shop_detail' => $request->input('shop_detail'),
            'image_url' => $request->input('image_url')
        ]);
        return view('shop_manager/shop/create_done');
    }

    public function shop_list()
    {
        $shop_manager_id = Auth::guard('shop_manager')->id();
        $shops = Shop::with('prefecture', 'genre')->where('shop_manager_id', $shop_manager_id)->paginate(3);
        return view('shop_manager/shop_list', compact('shops'));
    }

    public function qr_code()
    {
        return view('shop_manager/qr_code');
    }

    public function edit($shop_id)
    {
        $shop_manager_id = Auth::guard('shop_manager')->id();
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        $manage_shop = Shop::with('prefecture', 'genre')->where('id', $shop_id)->first();
        return view('shop_manager/shop/edit', compact('prefectures', 'genres', 'manage_shop'));
    }

    public function update(ShopRequest $request, $shop_id)
    {
        $shop_edit = $request->only(['shop_name', 'prefecture_id', 'genre_id', 'shop_detail', 'image_url']);
        Shop::find($shop_id)->update($shop_edit);
        return view('shop_manager/shop/edit_done');
    }

    public function reserve_list($shop_id)
    {
        $reserves = Reservation::with('user')->where('shop_id', $shop_id)->paginate(5);
        return view('shop_manager/reserve_list', compact('reserves'));
    }

    public function menu_new($shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        return view('shop_manager/menu/create', compact('shop'));
    }

    public function menu_store(MenuRequest $request, $shop_id)
    {
        Menu::create([
            'shop_id' => $shop_id,
            'menu_name' => $request->input('menu_name'),
            'price' => $request->input('price'),
            'menu_detail' => $request->input('menu_detail')
        ]);
        return view('shop_manager/menu/create_done');
    }

    public function menu_list($shop_id)
    {
        $user_id = Auth::id();
        $shop = Shop::where('id', $shop_id)->first();
        $menu = Menu::where('shop_id', $shop_id)->get();
        return view('shop_manager/menu/edit_list', compact('shop', 'menu'));
    }

    public function menu_edit($menu_id)
    {
        $shop_manager_id = Auth::guard('shop_manager')->id();
        $menu = Menu::where('id', $menu_id)->first();
        return view('shop_manager/menu/edit', compact('menu'));
    }

    public function menu_update(MenuRequest $request, $menu_id)
    {
        $menu = Menu::where('id', $menu_id)->get();
        $shop_edit = $request->only(['menu_name', 'price', 'menu_detail']);
        Menu::find($menu_id)->update($shop_edit);
        return view('shop_manager/menu/edit_done', compact('menu'));
    }
}
