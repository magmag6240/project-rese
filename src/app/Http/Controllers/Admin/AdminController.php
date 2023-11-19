<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopManager;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin/home', compact('user'));
    }

    public function new()
    {
        return view('admin/new_shop_manager');
    }

    public function show()
    {
        $shop_managers = ShopManager::paginate(5);
        return view('admin/shop_manager_list', compact('shop_managers'));
    }
}
