<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditorshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('editorships', function(Blueprint $table)
		{
			$table->integer('publication_id')->unsigned()->index('editorships_publication_id_foreign');
			$table->text('abstract', 65535)->nullable();
			$table->string('volume')->nullable();
			$table->string('publisher')->nullable();
			$table->string('key')->nullable();
			$table->string('doi')->nullable();
			$table->string('ee')->nullable();
			$table->string('url')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('editorships');
	}

}
