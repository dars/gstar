<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnTaxonomy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('taxonomies', function($table){
			$table->integer('weight')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('taxonomies', function($table){
			$table->dropColumn('weight');
		});
	}

}
