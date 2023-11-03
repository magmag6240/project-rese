<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreManagerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('store_manager_home', compact('user'));
    }

    public function new()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('store_manager_new', compact('prefectures', 'genres'));
    }

    public function create()
    {

        return view();
    }

    public function edit()
    {
        $user_id = Auth::id();
        $manage_shop = Shop::where('user_id', $user_id)->get();
        return view('store_manager_edit');
    }

    public function update() {

    }

    public function reserve_list() {

    }
}
