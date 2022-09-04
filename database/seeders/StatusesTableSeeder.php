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
                'platform_id' => 1,
                'name' => 'Active Status',
                'type' => 'OPEN',
                'created_at' => '2022-08-23 20:31:56',
                'updated_at' => '2022-08-23 20:31:56',
            ),
            1 =>
            array(
                'id' => 2,
                'platform_id' => 1,
                'name' => 'Closed Status',
                'type' => 'CLOSED',
                'created_at' => '2022-08-23 20:32:25',
                'updated_at' => '2022-08-23 20:32:25',
            ),
        ));
    }
}
