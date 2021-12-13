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
            
            array (
                'id' => 1,
                'name' => 'management.role',
                'guard_name' => 'web',
                'created_at' => '2021-12-13 17:51:59',
                'updated_at' => '2021-12-13 17:51:59',
            ),
            
            array (
                'id' => 2,
                'name' => 'management.user',
                'guard_name' => 'web',
                'created_at' => '2021-12-13 18:19:07',
                'updated_at' => '2021-12-13 18:38:09',
            ),
        ));
        
        
    }
}