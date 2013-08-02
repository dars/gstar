<?php

use Illuminate\Database\Migrations\Migration;

class CreateProdTab extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prod_tabs', function($table){
			$table->increments('id');
			$table->string('tab_key', 20);
			$table->integer('product_id');
			$table->string('title');
			$table->text('content');
			$table->integer('weight');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prod_tabs');
	}

}
