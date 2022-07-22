<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-12-13 17:51:59',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'management.role',
                'updated_at' => '2021-12-13 17:51:59',
            ),
            1 => 
            array (
                'created_at' => '2021-12-13 18:19:07',
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'management.user',
                'updated_at' => '2021-12-13 18:38:09',
            ),
        ));
        
        
    }
}