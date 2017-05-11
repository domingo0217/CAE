<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '123456789';
        DB::table('users')->insert([
            'name' => 'Domingo',
            'lastname' => 'Tineo',
            'telefhone' => '809-556-6465',
            'email' => 'domingo1702@gmail.com',
            'password' => bcrypt($password),
            'remember_token' => str_random(10)
        ]);
    }
}
