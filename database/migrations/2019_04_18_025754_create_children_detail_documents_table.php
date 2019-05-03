<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildrenDetailDocumentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('children_detail_documents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_children')->unsigned()->nullable()->index('id_children');
			$table->string('Document', 191)->nullable();
			$table->string('Asli_Fotocopy', 191)->nullable();
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
		Schema::drop('children_detail_documents');
	}
}
