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
                'created_at' => '2022-06-15 18:22:02',
                'email' => 'fatihtuzlu07@gmail.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'Fatih ONUR',
                'password' => '$2y$10$PwurQFVuksECc2T5tYmDROHrik5FZ2qnBpabX6/2EuX.G6Yo7NFY2',
                'remember_token' => NULL,
                'updated_at' => '2022-06-15 18:28:39',
            ),
        ));
        
        
    }
}