<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index('topic_group_topic_id_foreign');
			$table->integer('group_id')->unsigned()->index('topic_group_group_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topic_group');
	}

}
