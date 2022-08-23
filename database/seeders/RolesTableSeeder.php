<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2021-12-13 17:39:53',
                'updated_at' => '2021-12-13 17:44:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Client',
                'guard_name' => 'web',
                'created_at' => '2022-08-23 21:19:52',
                'updated_at' => '2022-08-23 21:19:52',
            ),
        ));
        
        
    }
}