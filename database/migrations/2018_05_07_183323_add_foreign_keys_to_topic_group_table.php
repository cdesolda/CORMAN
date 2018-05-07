<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTopicGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('topic_group', function(Blueprint $table)
		{
			$table->foreign('group_id')->references('id')->on('groups')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('topic_group', function(Blueprint $table)
		{
			$table->dropForeign('topic_group_group_id_foreign');
			$table->dropForeign('topic_group_topic_id_foreign');
		});
	}

}
