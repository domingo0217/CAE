<?php
	class UserSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
        $user = User::create(array(
                'id' => 1,
                'name' => 'Pascual',
                'last_name' => 'Volquez',
                'telefhone'=>'83465466546',
                'email' => 'neftalimorel@gmail.com',
                'password' => Hash::make('1234567890'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime      
        ));
        
    }
 
}