<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJournalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('journals', function(Blueprint $table)
		{
			$table->integer('publication_id')->unsigned()->index('journals_publication_id_foreign');
			$table->text('abstract', 65535)->nullable();
			$table->string('volume')->nullable();
			$table->string('number')->nullable();
			$table->string('pages', 50)->nullable();
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
		Schema::drop('journals');
	}

}
