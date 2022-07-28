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
                'name' => 'Haluk',
                'email' => 'halukbuyukozkan@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$kYoYjuwEcuyj3VUTXtCLHuHxoaomVcFztI3d.QN4bNfMjZ90cnpsu',
                'remember_token' => NULL,
                'created_at' => '2022-07-28 17:18:57',
                'updated_at' => '2022-07-28 17:18:57',
            ),
        ));
        
        
    }
}