<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('platforms')->delete();

        \DB::table('platforms')->insert(array(
            0 =>
            array(
                'id' => 1,
                'status_id' => null,
                'name' => 'localhost',
                'logo' => 'bsmaZP3ChJsLeRbN.png',
                'domain' => 'localhost',
                'api_token' => 'L8a4sXcdZK5LhDCyDpl1ZLNHU4gr0qa3OphcFMeQBirA2t4QmYo6LePMVM7P',
                'created_at' => '2022-08-08 14:55:14',
                'updated_at' => '2022-08-08 14:55:14',
            ),
        ));
    }
}
