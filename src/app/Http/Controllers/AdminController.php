<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
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
        $users = User::all();
        return view('admin/update', compact('users'));
    }

    public function update(Request $request)
    {
        $user_id = $request->input('user');
        $user_role = $request->only(['role']);
        User::find($user_id)->update($user_role);
        return view('admin/update_done');
    }

    public function show()
    {
        $shop_managers = User::where('role', 'shop_manager')->paginate(5);
        return view('admin/shop_manager_list', compact('shop_managers'));
    }
}
