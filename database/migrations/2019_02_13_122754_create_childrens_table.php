<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildrensTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable()->index('id_user');
            $table->integer('No_induk');
            $table->string('Nama_Lengkap', 191);
            $table->string('Agama', 191);
            $table->string('Tempat_lahir', 191);
            $table->date('Tgl_lahir');
            $table->string('Surat_Kelahiran_Akta', 191);
            $table->string('Alamat', 191);
            $table->date('Mulai_masuk_sekolah');
            $table->string('Nama_sekolah', 191);
            $table->string('Kelas', 191);
            $table->date('Tgl_masuk_PA');
            $table->string('Sebab_masuk_PA', 191);
            $table->string('Keterangan_anak', 191);
            $table->string('Nama_Wali', 191);
            $table->string('Nomor_telp_wali', 191);
            $table->string('Photo_anak', 191);
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
        Schema::drop('childrens');
    }
}
