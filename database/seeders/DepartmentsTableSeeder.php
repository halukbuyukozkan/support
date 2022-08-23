<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'platform_id' => 1,
                'name' => 'Department1',
                'created_at' => '2022-08-23 20:15:28',
                'updated_at' => '2022-08-23 20:15:28',
            ),
        ));
        
        
    }
}