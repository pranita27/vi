<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('submitted_id', 100);
			$table->string('phone', 13)->unique();
			$table->string('email', 150)->unique();
			$table->string('from', 100);
			$table->string('picture_file_path', 400);
			$table->softDeletes();
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
		Schema::drop('visitors');
	}

}
