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
            'name' => 'Khan Mohammad Rashedun-Naby',
            'username'  =>  'super_admin',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => 'Khowaj R Shobuj',
            'username'  =>  'admin',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'username'  =>  'employee',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => 'Joos Monkeyfied',
            'username'  =>  'joos',
            'password' => bcrypt('secret')
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '1',
            'role_id'  =>  '1'
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '2',
            'role_id'  =>  '2'
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '3',
            'role_id'  =>  '3'
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '4',
            'role_id'  =>  '3'
        ]);
        DB::table('roles')->insert([
            'role'  =>  'super_admin'
        ]);
        DB::table('roles')->insert([
            'role'  =>  'admin'
        ]);
        DB::table('roles')->insert([
            'role'  =>  'employee'
        ]);
    }
}
