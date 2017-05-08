<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function(Blueprint $table){
            $table->foreign('delegation_id')->references('id')->on('delegations')->onUpdate('cascade');
        });

        Schema::table('telephones', function(Blueprint $table){
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
        });

        Schema::table('document_member', function(Blueprint $table){
            $table->foreign('document_id')->references('id')->on('documents')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
        });

        Schema::table('charge_member', function(Blueprint $table){
            $table->foreign('charge_id')->references('id')->on('charges')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
        });

        Schema::table('capacitation_member', function(Blueprint $table){
            $table->foreign('capacitation_id')->references('id')->on('capacitations')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
        });

        Schema::table('assembly_member', function(Blueprint $table){
            $table->foreign('assembly_id')->references('id')->on('assemblies')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
        });

        Schema::table('topics', function(Blueprint $table){
            $table->foreign('assembly_id')->references('id')->on('assemblies')->onUpdate('cascade');
        });

        Schema::table('member_topic', function(Blueprint $table){
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
