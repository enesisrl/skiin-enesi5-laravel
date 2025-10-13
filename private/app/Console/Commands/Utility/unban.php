<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\Users\Models\User;

class unban extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:unban {username?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unban all banned users or single user passing username';

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

        $username = $this->argument('username');
        if ($username){
            $users = User::where("username",$username)->get();
        }else{
            $users = User::onlyBanned()->get();
        }
        if ($users->count()){
            foreach($users as $user){
                if ($user->isBanned()){
                    echo "User: ".$user->username." is banned\n";
                    $user->unban();
                    echo "UNBANNED NOW\n\n";
                }
            }
        }else{
            echo "Nothing to do\n";
        }


        return 0;
    }
}
