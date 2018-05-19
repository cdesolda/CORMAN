<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_groups', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name',255)->nullable(false)->unique();
            $table->text('description')->nullable(true);
            $table->text('contacts')->nullable(true);
            $table->string('picture_path',500);
            $table->integer('subscribers_count',false,true)->default(0); // no auto increment and unisgned integer column

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
        Schema::dropIfExists('research_groups');
    }
}
