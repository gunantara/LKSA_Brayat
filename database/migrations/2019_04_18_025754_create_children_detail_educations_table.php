<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildrenDetailEducationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('children_detail_educations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_children')->unsigned()->nullable()->index('id_children');
			$table->date('Tahun_Ajaran');
			$table->string('Nama_Sekolah', 191)->nullable();
			$table->string('Alamat_Sekolah', 191)->nullable();
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
		Schema::drop('children_detail_educations');
	}

}
