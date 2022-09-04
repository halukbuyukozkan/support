<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'platform_id' => 1,
                'platform_ref' => NULL,
                'name' => 'Haluk',
                'email' => 'halukbuyukozkan@gmail.com',
                'email_verified_at' => NULL,
                'phone' => NULL,
                'password' => '$2y$10$djFMn3hZHpOdcIjaaAe55.iY5E0cnQsiA6pErzetut5Xig0PFzCYy',
                'remember_token' => NULL,
                'created_at' => '2022-07-28 18:45:37',
                'updated_at' => '2022-07-28 18:45:37',
            ),
            1 =>
            array(
                'id' => 2,
                'platform_id' => 1,
                'platform_ref' => NULL,
                'name' => 'user',
                'email' => 'user@a.com',
                'email_verified_at' => NULL,
                'phone' => NULL,
                'password' => '$2y$10$djFMn3hZHpOdcIjaaAe55.iY5E0cnQsiA6pErzetut5Xig0PFzCYy',
                'remember_token' => NULL,
                'created_at' => '2022-08-09 21:54:33',
                'updated_at' => '2022-08-09 21:54:33',
            ),
            2 => array(
                'id' => 3,
                'platform_id' => 1,
                'platform_ref' => NULL,
                'name' => 'Tunahan Caliskan',
                'email' => 'mail@tunahancaliskan.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$NRwoLSchLPObIh36cRpPvuxvcMfVGBHTxfzQqiGoIeb3KpxUfyE/m',
                'phone' => '+905316952429',
                'remember_token' => NULL,
                'created_at' => '2021-12-13 16:45:59',
                'updated_at' => '2022-05-25 12:14:53',
            ),
        ));
    }
}
