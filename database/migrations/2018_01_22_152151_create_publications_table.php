<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            
            //Setting  a very broad length based on; http://vocaro.com/trevor/blog/2006/09/12/top-ten-longest-titles-of-research-papers/
            $table->string('title',500)->nullable(false); 
            $table->enum('type', ['journal','conference','editorship'])->nullable(false);
            $table->string('venue')->nullable(false);
            $table->date('year');
            $table->string('multimedia_path')->nullable(false);
            $table->boolean('public')->default('1');
            
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
        Schema::dropIfExists('publications');
    }
}
