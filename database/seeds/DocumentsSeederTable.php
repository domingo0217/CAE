<?php

use Illuminate\Database\Seeder;

class DocumentsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            'document' => 'Acta de Buena Conducta'
        ]);

        DB::table('documents')->insert([
            'document' => 'Acta de nacimiento'
        ]);
    }
}
