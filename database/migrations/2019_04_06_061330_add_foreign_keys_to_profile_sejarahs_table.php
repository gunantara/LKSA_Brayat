<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfileSejarahsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profile_sejarahs', function(Blueprint $table)
		{
			$table->foreign('id_about', 'profile_sejarahs_ibfk_1')->references('id')->on('abouts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profile_sejarahs', function(Blueprint $table)
		{
			$table->dropForeign('profile_sejarahs_ibfk_1');
		});
	}

}
