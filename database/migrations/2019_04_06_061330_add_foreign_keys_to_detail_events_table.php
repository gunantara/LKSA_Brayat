<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detail_events', function(Blueprint $table)
		{
			$table->foreign('id_event', 'detail_events_ibfk_1')->references('id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detail_events', function(Blueprint $table)
		{
			$table->dropForeign('detail_events_ibfk_1');
		});
	}

}
