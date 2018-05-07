<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicPublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic_publication', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index('topic_publication_topic_id_foreign');
			$table->integer('publication_id')->unsigned()->index('topic_publication_publication_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topic_publication');
	}

}
