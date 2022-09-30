<?php

namespace App\Console\Commands;

use App\Model\Promocode;
use Illuminate\Console\Command;
use App\Model\Order;
use App\Traits\GeneralTrait;


class PatientNotify extends Command
{
    use GeneralTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patient:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify patient before order in 1 hour';

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

        try{
            
        $IDarr = User::whereDate('type' , \Carbon\Carbon::today())->pluck('player_id');
        $users = User::whereDate('type' , \Carbon\Carbon::today())->update(['after_six_months' => \Carbon\Carbon::now()->addMonth(6)]);;

        $this->send($IDarr , 'LaithClinic' , 'تذكير المراجعة كل ستة اشهر' );

        }catch (\Throwable $th) {
               
            }
           
    }
}
