<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),

        ]);
    }
}
