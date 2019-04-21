<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChildrenDetailDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('children_detail_documents', function(Blueprint $table)
		{
			$table->foreign('id_children', 'children_detail_documents_ibfk_1')->references('id')->on('childrens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('children_detail_documents', function(Blueprint $table)
		{
			$table->dropForeign('children_detail_documents_ibfk_1');
		});
	}

}
