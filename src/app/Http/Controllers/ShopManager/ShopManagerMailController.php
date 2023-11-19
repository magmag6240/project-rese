<?php

namespace App\Http\Controllers\ShopManager;

use App\Http\Controllers\Controller;
use App\Mail\InformationEmail;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShopManagerMailController extends Controller
{
    public function index()
    {
        return view('shop_manager/mail');
    }

    public function send(Request $request)
    {
        $shop = Shop::where('shop_manager_id', Auth::guard('shop_manager')->id())->first();
        $users = Reservation::with('user', 'shop')->where('shop_id', $shop->id)->get();
        foreach ($users as $user) {
            $data = User::where('id', $user->user_id)->get();
            foreach($data as $mail){
                $contents = $request['contents'];
                Mail::to($mail->email)
                ->send(new InformationEmail($contents));
                return view('shop_manager/mail_done');
            }
        }
    }
}
