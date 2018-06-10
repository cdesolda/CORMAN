<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePublicationResearchGroupsTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $currentTableName = 'publication_research_group';
        $newTableName = 'publication_research_groups';
        Schema::rename($currentTableName, $newTableName);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $currentTableName = 'publication_research_group';
        $newTableName = 'publication_research_groups';
        Schema::rename($newTableName, $currentTableName);
    }
}
