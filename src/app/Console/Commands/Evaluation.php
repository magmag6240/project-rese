<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\EvaluationEmail;
use App\Models\User;
use Illuminate\Console\Command;

class Evaluation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'evaluation:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send evaluation emails to users';

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
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $yesterday_reserve_users = Reservation::where('reserve_date', $yesterday)->get();

        foreach($yesterday_reserve_users as $reserve){
            $users = User::where('id', $reserve->user_id)->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new EvaluationEmail($user));
            }
        }
    }
}
