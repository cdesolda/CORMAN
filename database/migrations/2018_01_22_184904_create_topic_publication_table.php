<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_publication', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('topic_id')->unsigned();
            $table->integer('publication_id')->unsigned();

            //Constraints
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('publication_id')->references('id')->on('publications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_publication');
    }
}
