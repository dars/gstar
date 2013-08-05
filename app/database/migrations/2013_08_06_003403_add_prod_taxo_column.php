<?php

use Illuminate\Database\Migrations\Migration;

class AddProdTaxoColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function($table){
			$table->integer('taxonomy_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function($table){
			$table->dropColumn('taxonomy_id');
		});
	}

}
