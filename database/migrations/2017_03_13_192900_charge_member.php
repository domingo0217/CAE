<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChargeMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_member', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->primary('charge_id', 'member_id');
            $table->integer('charge_id')->unsigned()->index();
            $table->bigInteger('member_id')->unsigned()->index();
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
        Schema::dropIfExists('charge_member');
    }
}
