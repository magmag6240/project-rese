<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreManagerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('store_manage_home', compact('user'));
    }

    public function edit()
    {
        return view('store_manage_edit');
    }

    public function update() {

    }

    public function reserve_list() {

    }
}
