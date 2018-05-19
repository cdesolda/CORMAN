<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchGroupsResearchLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_groups_research_line', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('research_group_id')->unsigned();
            $table->integer('research_line_id')->unsigned();

            $table->timestamps();

            //Constraints
            $table->foreign('research_line_id')->references('id')->on('research_line');
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
        Schema::dropIfExists('research_groups_research_line');
    }
}
