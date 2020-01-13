<?php


namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateAdmins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin  {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create system admins';

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
     * @return mixed
     */
    public function handle()
    {
        
        $email = $this->option('email');
        $password = $this->option('password');
        $role = 'Admin';        
        $user = User::create(
            ['email'=>$email,
            'password'=>bcrypt($password),
            'role'=>$role]);
        $user->assignRole('Admin');
    }
}
