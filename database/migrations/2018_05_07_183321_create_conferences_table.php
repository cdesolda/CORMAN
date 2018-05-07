<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conferences', function(Blueprint $table)
		{
			$table->integer('publication_id')->unsigned()->index('conferences_publication_id_foreign');
			$table->text('abstract', 65535)->nullable();
			$table->string('pages', 50)->nullable();
			$table->string('days', 25)->nullable();
			$table->string('key')->nullable();
			$table->string('doi')->nullable();
			$table->string('ee')->nullable();
			$table->string('url')->nullable();
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
		Schema::drop('conferences');
	}

}
