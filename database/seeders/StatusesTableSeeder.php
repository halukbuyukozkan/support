<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('statuses')->delete();

        \DB::table('statuses')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Status1',
                'created_at' => '2022-08-08 14:55:14',
                'updated_at' => '2022-08-08 14:55:14',
            ),
        ));
    }
}
