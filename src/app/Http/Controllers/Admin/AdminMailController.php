<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewShopManagerEmail;
use App\Mail\NoticeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminMailController extends Controller
{
    public function index()
    {
        return view('admin/mail');
    }

    public function new_shop_manager_mail(Request $request)
    {
        $email = $request->input('email');
        Mail::to($email)->send(new NewShopManagerEmail());
        return view('admin/new_shop_manager_done');
    }

    public function mail_all_users(Request $request)
    {
        $all_user = User::all();
        $contents = $request['contents'];
        foreach($all_user as $user)
        Mail::to($user->email)
            ->send(new NoticeEmail($contents));
        return view('admin/mail_done');
    }

}
