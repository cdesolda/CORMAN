<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_from');
			$table->integer('user_to');
			$table->text('msg', 65535)->nullable();
			$table->timestamp('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('status');
			$table->string('attachment')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}
