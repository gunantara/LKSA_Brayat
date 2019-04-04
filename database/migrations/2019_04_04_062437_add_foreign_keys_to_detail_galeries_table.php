<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailGaleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detail_galeries', function(Blueprint $table)
		{
			$table->foreign('id_galeries', 'detail_galeries_ibfk_1')->references('id')->on('galeries')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detail_galeries', function(Blueprint $table)
		{
			$table->dropForeign('detail_galeries_ibfk_1');
		});
	}

}
