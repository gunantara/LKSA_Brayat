<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_employee')->unsigned()->nullable()->index('id_employee');
			$table->string('name', 191);
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('type', 191)->default('user');
			$table->text('bio', 65535)->nullable();
			$table->string('photo', 191)->nullable()->default('profile.png');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
