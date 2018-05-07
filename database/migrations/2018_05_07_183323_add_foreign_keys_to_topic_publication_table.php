<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTopicPublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('topic_publication', function(Blueprint $table)
		{
			$table->foreign('publication_id')->references('id')->on('publications')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('topic_id')->references('id')->on('topics')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('topic_publication', function(Blueprint $table)
		{
			$table->dropForeign('topic_publication_publication_id_foreign');
			$table->dropForeign('topic_publication_topic_id_foreign');
		});
	}

}
