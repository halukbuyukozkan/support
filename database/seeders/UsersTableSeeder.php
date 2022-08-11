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
        
        \DB::table('users')->insert(array (
            0 => 
            array (
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
            array (
                'id' => 2,
                'platform_id' => 1,
                'platform_ref' => NULL,
                'name' => 'user',
                'email' => 'user@a.com',
                'email_verified_at' => NULL,
                'phone' => NULL,
                'password' => '$2y$10$LPb9IeVWbQ7swoUln.KVpe8Ot/ZuTGjKu/Atc4cGNAt5XXLn.ZYh6',
                'remember_token' => NULL,
                'created_at' => '2022-08-09 21:54:33',
                'updated_at' => '2022-08-09 21:54:33',
            ),
        ));
        
        
    }
}