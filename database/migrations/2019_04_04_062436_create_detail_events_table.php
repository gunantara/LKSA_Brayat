<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_event')->unsigned()->nullable()->index('id_event');
			$table->string('keterangan', 191);
			$table->date('tgl_mulai');
			$table->date('tgl_berakhir');
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
		Schema::drop('detail_events');
	}

}
