<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            
            $table->integer('publication_id')->unsigned();
            $table->text('abstract')->nullable(true);
            $table->string('volume',255)->nullable(true);
            $table->string('number')->nullable(true);
            $table->string('pages',50)->nullable(true);
            $table->string('key',255)->nullable(true);
            $table->string('doi',255)->nullable(true);
            $table->string('ee',255)->nullable(true);
            $table->string('url',255)->nullable(true);
            $table->timestamps();
        
            //Constraints
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
