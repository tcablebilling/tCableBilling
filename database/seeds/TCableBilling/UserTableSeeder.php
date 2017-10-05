<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Khan MD. Rashedun-Naby',
            'username'	=>	'admin',
            'email' => 'naby88@gmail.com',
            'password' => bcrypt('1'),
        ]);
    }
}
