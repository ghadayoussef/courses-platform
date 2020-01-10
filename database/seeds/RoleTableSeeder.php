<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
       $role_teacher = Role::create(['name'=>'Teacher']);
       $role_teacher->givePermisionTo(['view courses', 
       'create course', 
       'edit course', 
       'delete course',
       'view supporters',
       'create supporter',
       'update supporter',
       'delete supporter',
       'ban supporter',
       'approve/dissaprove comment']);
       $role_supporter = Role::create(['name'=>'Supporter']);

    }
}
