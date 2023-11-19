<?php

namespace App\Http\Controllers\ShopManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\ShopManager;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ShopManagerRegisterController extends Controller
{
    public function create(): View
    {
        return view('shop_manager.auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $shop_manager = ShopManager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($shop_manager));

        Auth::guard('shop_manager')->login($shop_manager);

        return redirect(RouteServiceProvider::HOME);
    }
}
