<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildrenOtherFamiliesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('children__other__families', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_children')->unsigned()->nullable()->index('id_children');
			$table->string('Nama', 191)->nullable();
			$table->string('Tempat_lahir', 191)->nullable();
			$table->date('Tgl_lahir')->nullable();
			$table->string('Sekolah', 191)->nullable();
			$table->string('Kelas', 191)->nullable();
			$table->string('Keterangan', 191)->nullable();
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
		Schema::drop('children__other__families');
	}
}
