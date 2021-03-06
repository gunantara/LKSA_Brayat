<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_user')->unsigned()->nullable()->index('id_user');
			$table->string('email', 191)->nullable();
			$table->string('Telp', 191)->nullable();
			$table->string('Alamat', 191)->nullable();
			$table->string('No_Rekening', 191)->nullable();
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
		Schema::drop('contacts');
	}
}
