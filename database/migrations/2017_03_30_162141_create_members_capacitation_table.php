<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersCapacitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitation_member', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->primary('capacitation_id', 'member_id');
            $table->bigInteger('member_id');
            $table->bigInteger('capacitation_id');
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
        Schema::dropIfExists('capacitation_member');
    }
}
