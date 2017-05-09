<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Pagos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 11);
            $table->double('Monto');
            $table->date('fecha_pago');
            $table->string('member_id', 11)->index();
            $table->primary('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('Pagos');
    }
}
