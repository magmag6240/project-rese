<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemainderEmail;
use App\Models\User;
use Illuminate\Console\Command;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send remainder emails to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today()->format('Y-m-d');
        $today_reserve_users = Reservation::where('reserve_date', $today)->get();

        foreach($today_reserve_users as $reserve){
            $users = User::where('id', $reserve->user_id)->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new RemainderEmail($user));
            }
        }
    }
}
