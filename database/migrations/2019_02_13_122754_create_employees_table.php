<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Nama_lengkap', 191);
			$table->string('NIK', 191);
			$table->string('Jenis_Kelamin', 191);
			$table->string('Tempat_lahir', 191);
			$table->date('Tgl_lahir');
			$table->timestamp('Mulai_Bekerja')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('Jabatan', 191);
			$table->string('Status_Kepegawaian', 191);
			$table->string('Pendidikan_Terakhir', 191);
			$table->string('Pelatihan_yg_diikuti', 191);
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
		Schema::drop('employees');
	}

}
