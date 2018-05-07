<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPublicationGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('publication_groups', function(Blueprint $table)
		{
			$table->foreign('group_id')->references('id')->on('groups')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('publication_groups', function(Blueprint $table)
		{
			$table->dropForeign('publication_groups_group_id_foreign');
			$table->dropForeign('publication_groups_publication_id_foreign');
			$table->dropForeign('publication_groups_user_id_foreign');
		});
	}

}
