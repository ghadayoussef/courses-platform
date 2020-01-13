<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $permissions = [
            'view courses', 
            'create course', 
            'edit course', 
            'delete course',
 
            'view teachers', 
            'create teacher', 
            'update teacher', 
            'delete teacher',

            'view supporters',
            'create supporter',
            'update supporter',
            'delete supporter',
            'ban supporter',


            'approve/dissaprove comment'
 
         ];

         foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);

       }
    }
}
