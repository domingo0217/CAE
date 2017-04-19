<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DroppingForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function(Blueprint $table){
            $table->dropForeign(['delegation_id']);
            // $table->dropColumn('delegation_id');
        });

        Schema::table('telephones', function(Blueprint $table){
            $table->dropForeign(['member_id']);
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->dropForeign(['city_id']);
            $table->dropForeign(['member_id']);
        });

        Schema::table('document_member', function(Blueprint $table){
            $table->dropForeign(['document_id']);
            $table->dropForeign(['member_id']);
        });

        Schema::table('charge_member', function(Blueprint $table){
            $table->dropForeign(['charge_id']);
            $table->dropForeign(['member_id']);
        });

        Schema::table('capacitation_member', function(Blueprint $table){
            $table->dropForeign(['capacitation_id']);
            $table->dropForeign(['member_id']);
        });

        Schema::table('assembly_member', function(Blueprint $table){
            $table->dropForeign(['member_id']);
            $table->dropForeign(['assembly_id']);
        });

        Schema::table('topics', function(Blueprint $table){
            $table->dropForeign(['assembly_id']);
        });

        Schema::table('member_topic', function(Blueprint $table){
            $table->dropForeign(['member_id']);
            $table->dropForeign(['topic_id']);
        });
    }
}
