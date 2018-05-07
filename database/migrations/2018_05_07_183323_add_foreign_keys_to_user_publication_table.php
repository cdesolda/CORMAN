<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserPublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_publication', function(Blueprint $table)
		{
			$table->foreign('publication_id')->references('id')->on('publications')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_publication', function(Blueprint $table)
		{
			$table->dropForeign('user_publication_publication_id_foreign');
			$table->dropForeign('user_publication_user_id_foreign');
		});
	}

}
