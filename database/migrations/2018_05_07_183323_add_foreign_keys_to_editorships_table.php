<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEditorshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('editorships', function(Blueprint $table)
		{
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
		Schema::table('editorships', function(Blueprint $table)
		{
			$table->dropForeign('editorships_publication_id_foreign');
		});
	}

}
