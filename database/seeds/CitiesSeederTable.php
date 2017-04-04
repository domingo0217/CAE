<?php

use Illuminate\Database\Seeder;

class CitiesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city' => 'Santiago'
        ]);
    }
}
