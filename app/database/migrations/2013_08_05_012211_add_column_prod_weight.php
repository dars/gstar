<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnProdWeight extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function($table){
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
		Schema::table('products', function($table){
			$table->dropColumn('weight');
		});
	}

}
