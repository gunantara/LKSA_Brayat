<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildrenDetailsTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('children__details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_children')->unsigned()->nullable()->index('id_children');
            $table->string('Nama_Ayah', 191);
            $table->string('Alamat_Ayah', 191);
            $table->string('Agama_Ayah', 191);
            $table->string('Status_Ayah', 191);
            $table->string('Pendidikan_Ayah', 191);
            $table->string('Pekerjaan_Ayah', 191);
            $table->string('Penghasilan_Ayah', 191);
            $table->string('Nama_Ibu', 191);
            $table->string('Alamat_Ibu', 191);
            $table->string('Pendidikan_Ibu', 191);
            $table->string('Agama_Ibu', 191);
            $table->string('Status_Ibu', 191);
            $table->string('Pekerjaan_Ibu', 191);
            $table->string('Penghasilan_Ibu', 191);
            $table->string('Tanggungan', 191);
            $table->string('Perumahan', 191);
            $table->string('Latar_Belakang_Permasalahan', 191);
            $table->string('Alamat_yg_menitipkan', 191);
            $table->string('Alasan_yg_menitipkan', 191);
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
        Schema::drop('children__details');
    }
}
