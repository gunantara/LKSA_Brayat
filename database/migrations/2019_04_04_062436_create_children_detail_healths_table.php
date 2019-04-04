<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildrenDetailHealthsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('children_detail_healths', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_children')->unsigned()->nullable()->index('id_children');
			$table->string('Tinggi_Badan', 191);
			$table->string('Berat_Badan', 191);
			$table->string('Golongan_Darah', 191);
			$table->string('Alergi_Makanan', 191);
			$table->string('Alergi_Minuman', 191);
			$table->string('Alergi_Obat', 191);
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
		Schema::drop('children_detail_healths');
	}
}
