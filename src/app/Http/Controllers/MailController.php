<?php

namespace App\Http\Controllers;

use App\Mail\InvitationStoreManagerEmail;
use App\Mail\InformationEmail;
use App\Mail\NoticeEmail;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $user_role = Auth::user()->role;
        if($user_role == 'shop_manager'){
            $shops = Shop::where('user_id', Auth::id())->get();
            foreach($shops as $shop){
                $users = Reservation::with('user')->where('shop_id', $shop->id)->get();
                return view('shop_manager/mail', compact('users'));
            }
        }
        if ($user_role == 'admin') {
            $users = User::get();
            return view('admin/mail', compact('users'));
        }
    }

    public function send(Request $request)
    {
        $mail_recipient = $request->input('user');
        Mail::to($mail_recipient)->send(new InformationEmail());
    }

    public function invitation_store_manager(Request $request)
    {
        $mail_recipient = $request->input('email');
        Mail::to($mail_recipient)->send(new InvitationStoreManagerEmail());
        return view();
    }

    public function mail_all_users()
    {
        $all_user = User::get();
        Mail::to($all_user)->send(new NoticeEmail());
        return view();
    }
}
