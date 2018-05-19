<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchGroupsOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_groups_office', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('research_group_id')->unsigned();
            $table->integer('office_id')->unsigned();

            $table->timestamps();

            //Constraints
            $table->foreign('office_id')->references('id')->on('office');
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
        Schema::dropIfExists('research_groups_office');
    }
}
