<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
           'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        
    }
}
