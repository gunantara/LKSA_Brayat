<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChildrenDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('children__details', function(Blueprint $table)
		{
			$table->foreign('id_children', 'children__details_ibfk_1')->references('id')->on('childrens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('children__details', function(Blueprint $table)
		{
			$table->dropForeign('children__details_ibfk_1');
		});
	}

}
