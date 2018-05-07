<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conversation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_one');
			$table->integer('user_two');
			$table->timestamp('last_messages')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['user_one','user_two'], 'user_one');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conversation');
	}

}
