<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileSejarahsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_sejarahs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_about')->unsigned()->nullable()->index('id_about');
			$table->string('Photo', 191);
			$table->string('Title', 191);
			$table->string('Profile_sejarah', 2000);
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
		Schema::drop('profile_sejarahs');
	}

}
