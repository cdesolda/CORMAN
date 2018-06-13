<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePublicationResearchGroupsTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publication_research_groups', function (Blueprint $table) {
            $table->dropForeign(['rline_id']);
            $table->dropColumn('rline_id');
        });

        Schema::create('publication_research_group_rline', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pub_rg_id')->unsigned();
            $table->integer('research_line_id')->unsigned();

            $table->timestamps();

            //Constraints
            $table->foreign('pub_rg_id')->references('id')->on('publication_research_groups');
            $table->foreign('research_line_id')->references('id')->on('research_line');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('publication_research_groups', function (Blueprint $table) {
            $table->integer('rline_id')->unsigned()->nullable()->default(null);
            $table->foreign('rline_id')->references('id')->on('research_line');
        });

        Schema::dropIfExists('publication_research_group_rline');
    }
}
