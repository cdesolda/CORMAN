<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserTopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_topic', function(Blueprint $table)
		{
			$table->foreign('topic_id')->references('id')->on('topics')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('user_topic', function(Blueprint $table)
		{
			$table->dropForeign('user_topic_topic_id_foreign');
			$table->dropForeign('user_topic_user_id_foreign');
		});
	}

}
