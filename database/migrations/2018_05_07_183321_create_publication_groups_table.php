<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicationGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publication_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('publication_id')->unsigned();
			$table->integer('group_id')->unsigned()->index('publication_groups_group_id_foreign');
			$table->integer('user_id')->unsigned()->index('publication_groups_user_id_foreign');
			$table->timestamps();
			$table->unique(['publication_id','group_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publication_groups');
	}

}
