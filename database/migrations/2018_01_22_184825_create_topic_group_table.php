<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_group', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('topic_id')->unsigned();
            $table->integer('group_id')->unsigned();
            
            //Constraints
            $table->foreign('topic_id')->references('id')->on('topics');
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
        Schema::dropIfExists('topic_group');
    }
}
