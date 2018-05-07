<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
         
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('picture_path')->default('link/to/default/pic'); #replace with default picture path
            $table->integer('affiliation_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('reference_link',1620)->nullable();
			$table->unique( array('first_name','last_name') );    
			
            $table->timestamps();
            //Constraints
            $table->foreign('affiliation_id')->references('id')->on('affiliations'); #foreign for 1-m relation with affiliations table
            $table->foreign('role_id')->references('id')->on('roles'); #foreign for 1-m relation with roles table
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
