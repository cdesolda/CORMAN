<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_groups', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('publication_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();
            
            //Constraints
            $table->unique(['publication_id', 'group_id']);

            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('group_id')->references('id')->on('groups');

           


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_group');
    }
}
