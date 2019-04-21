<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_user')->unsigned()->nullable()->index('id_user');
			$table->string('Tipe_Fasilitas', 191);
			$table->string('Nama_Fasilitas', 191);
			$table->integer('Jumlah');
			$table->string('Keterangan', 191);
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
		Schema::drop('inventories');
	}

}
