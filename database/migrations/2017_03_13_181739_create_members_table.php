<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 25);
            $table->string('lastname', 25);
            $table->string('nationality', 25);
            $table->string('identification_document', 11)->unique();
            $table->date('birthdate');
            $table->enum('civil_status', array('soltero', 'casado', 'divorciado' ,'viudo'));
            $table->string('email', 25)->unique();
            $table->integer('telephone_id');
            $table->integer('address_id');
            $table->integer('delegation_id');
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
        Schema::dropIfExists('members');
    }
}
