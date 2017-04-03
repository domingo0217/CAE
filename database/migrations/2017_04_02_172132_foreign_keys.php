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
            $table->foreign('delegation_id')->references('id')->on('delegations')->onDelete('cascade');
        });

        Schema::table('telephones', function(Blueprint $table){
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });

        Schema::table('document_member', function(Blueprint $table){
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });

        Schema::table('charge_member', function(Blueprint $table){
            $table->foreign('charge_id')->references('id')->on('charges')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });

        Schema::table('capacitation_member', function(Blueprint $table){
            $table->foreign('capacitation_id')->references('id')->on('capacitations')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function(Blueprint $table){
            $table->dropForeign('members_delegation_id_foreign');
            $table->dropForeign('members_address_id_foreign');
            $table->dropForeign('members_charge_id_foreign');
        });

        Schema::table('telephones', function(Blueprint $table){
            $table->dropForeign('telephones_member_id_foreign');
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->dropForeign('addresses_city_id_foreign');
            $table->dropForeign('addresses_member_id_foreign');
        });

        Schema::table('document_member', function(Blueprint $table){
            $table->dropForeign('documents_document_id_foreign');
            $table->dropForeign('documents_member_id_foreign');
        });

        Schema::table('charge_member', function(Blueprint $table){
            $table->dropForeign('charges_charge_id_foreign');
            $table->dropForeign('charges_member_id_foreign');
        });

        Schema::table('capacitation_member', function(Blueprint $table){
            $table->dropForeign('capacitation_member_capacitation_id_foreign');
            $table->dropForeign('capacitation_member_id_foreign');
        });
    }
}
