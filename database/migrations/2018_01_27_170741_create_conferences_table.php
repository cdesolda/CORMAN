<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->integer('publication_id')->unsigned();
            
            $table->text('abstract')->nullable(true);
            $table->string('pages',50)->nullable(true);
            $table->string('days',25)->nullable(true); //e.g. from 02/12 to 06/12
            $table->string('key',255)->nullable(true);
            $table->string('doi',255)->nullable(true);
            $table->string('ee',255)->nullable(true);
            $table->string('url',255)->nullable(true);
            $table->timestamps();

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
        Schema::dropIfExists('conferences');
    }
}
