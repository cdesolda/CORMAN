<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAuthorPublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('author_publication', function(Blueprint $table)
		{
			$table->foreign('author_id')->references('id')->on('authors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('publication_id')->references('id')->on('publications')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('author_publication', function(Blueprint $table)
		{
			$table->dropForeign('author_publication_author_id_foreign');
			$table->dropForeign('author_publication_publication_id_foreign');
		});
	}

}
