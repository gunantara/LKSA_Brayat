<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGaleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galeries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_user')->unsigned()->nullable()->index('id_user');
			$table->string('Kegiatan', 191);
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
		Schema::drop('galeries');
	}

}
