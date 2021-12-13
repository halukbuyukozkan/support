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
            
            array (
                'id' => 1,
                'name' => 'Tunahan Caliskan',
                'email' => 'mail@tunahancaliskan.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$NRwoLSchLPObIh36cRpPvuxvcMfVGBHTxfzQqiGoIeb3KpxUfyE/m',
                'remember_token' => 'MPHXhzXYwDGFFhYEPwteZFaYCehN0bu0dVjBrFqBtGP1yqxvTyTLFrVOrFhZ',
                'created_at' => '2021-12-13 16:45:59',
                'updated_at' => '2021-12-13 17:11:26',
            ),
        ));
        
        
    }
}