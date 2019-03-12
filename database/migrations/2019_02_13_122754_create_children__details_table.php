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
            $table->string('Nama_Ayah', 191)->nullable();
            $table->string('Alamat_Ayah', 191)->nullable();
            $table->string('Agama_Ayah', 191)->nullable();
            $table->string('Status_Ayah', 191)->nullable();
            $table->string('Pendidikan_Ayah', 191)->nullable();
            $table->string('Pekerjaan_Ayah', 191)->nullable();
            $table->string('Penghasilan_Ayah', 191)->nullable();
            $table->string('Nama_Ibu', 191)->nullable();
            $table->string('Alamat_Ibu', 191)->nullable();
            $table->string('Pendidikan_Ibu', 191)->nullable();
            $table->string('Agama_Ibu', 191)->nullable();
            $table->string('Status_Ibu', 191)->nullable();
            $table->string('Pekerjaan_Ibu', 191)->nullable();
            $table->string('Penghasilan_Ibu', 191)->nullable();
            $table->string('Tanggungan', 191)->nullable();
            $table->string('Perumahan', 191)->nullable();
            $table->string('Latar_Belakang_Permasalahan', 191)->nullable();
            $table->string('Alamat_yg_menitipkan', 191)->nullable();
            $table->string('Alasan_yg_menitipkan', 191)->nullable();
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
