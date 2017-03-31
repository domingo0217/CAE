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
        Schema::create('capacitation_member', function (Blueprint $table) {
            $table->primary('capacitation_id', 'member_id');
            $table->integer('capacitation_id')->unsigned()->index();
            $table->integer('member_id')->unsigned()->index();           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('capacitation_member');
    }
}
