<?php

use Illuminate\Database\Seeder;

class DelegationsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delegations')->insert([
            'delegation' => 'Central'
        ]);
    }
}
