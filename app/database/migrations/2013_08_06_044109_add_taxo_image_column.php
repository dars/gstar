<?php

use Illuminate\Database\Migrations\Migration;

class AddTaxoImageColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('taxonomies', function($table){
			$table->string('image')->nullable();
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
			$table->dropColumn('image');
		});
	}

}
