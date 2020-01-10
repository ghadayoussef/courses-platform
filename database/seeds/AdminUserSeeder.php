<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $user = User::create([

            'email' => 'admin@admin.com',
            //'password' => bcrypt('123456'),
            'password' => '123456',

        ]);
        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());
        $user->assignRole('Admin');

    }
}
