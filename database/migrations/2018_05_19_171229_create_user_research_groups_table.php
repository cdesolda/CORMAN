<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResearchGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_research_groups', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            $table->integer('research_group_id')->unsigned();
            $table->enum('role', ['admin', 'member'])->default('member');
            $table->enum('state',['accepted','pending'])->nullable();


            $table->timestamps();

            //Constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('research_group_id')->references('id')->on('research_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_research_groups');
    }
}
