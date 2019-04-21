<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAboutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abouts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_user')->unsigned()->nullable()->index('id_user');
			$table->string('Logo_LKSA', 191)->nullable();
			$table->string('Nama_LKSA', 191)->nullable();
			$table->string('Photo_about', 191)->nullable();
			$table->string('Title_about', 191)->nullable();
			$table->string('Quote', 2000)->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('abouts');
	}

}
