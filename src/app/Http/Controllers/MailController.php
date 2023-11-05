<?php

namespace App\Http\Controllers;

use App\Mail\InformationMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $user_role = Auth::user()->role;
        if($user_role == 'shop_manager'){
            $users = User::where('role', 'general')->get();
            return view('shop_manager/mail', compact('users'));
        }
        if ($user_role == 'admin') {
            $users = User::where('role', 'general')->orWhere('role', 'store_manager')->get();
            return view('admin/mail', compact('users'));
        }
    }

    public function send()
    {
        $users = User::get();
        foreach($users as $user){
            Mail::to($user->email)->send(new InformationMail());
        }
        return view();
    }
}
