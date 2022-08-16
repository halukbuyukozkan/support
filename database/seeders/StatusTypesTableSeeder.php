<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status_types')->delete();
        
        \DB::table('status_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Kapalı',
                'created_at' => '2022-08-15 23:04:38',
                'updated_at' => '2022-08-15 23:04:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Aktif',
                'created_at' => '2022-08-15 23:09:07',
                'updated_at' => '2022-08-15 23:09:07',
            ),
        ));
        
        
    }
}