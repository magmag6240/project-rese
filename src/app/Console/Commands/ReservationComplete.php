<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompleteReservationEmail;

class ReservationComplete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:complete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send complete reservation emails to users';

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
        $from = Carbon::now()->subMinutes(2);

        $reserve_complete = Reservation::where('created_at', '>', $from)->get();
        foreach ($reserve_complete as $reserve) {
            $users = User::where('id', $reserve->user_id)->get();
            foreach ($users as $user) {
            Mail::to($user->email)->send(new CompleteReservationEmail($user));
            }
        }
    }
}
