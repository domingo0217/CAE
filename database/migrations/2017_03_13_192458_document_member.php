->unsigned()->index()<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_member', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->primary('document_id', 'member_id');
            $table->bigInteger('document_id')->unsigned()->index();
            $table->bigInteger('member_id')->unsigned()->index();
            $table->boolean('confirmed')->default(false);
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
        Schema::dropIfExists('document_member');
    }
}
