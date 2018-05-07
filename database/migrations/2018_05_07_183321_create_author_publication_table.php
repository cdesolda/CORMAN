<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthorPublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('author_publication', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('author_id')->unsigned()->index('author_publication_author_id_foreign');
			$table->integer('publication_id')->unsigned()->index('author_publication_publication_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('author_publication');
	}

}
