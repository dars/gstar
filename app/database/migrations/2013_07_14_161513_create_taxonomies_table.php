<?php

use Illuminate\Database\Migrations\Migration;

class CreateTaxonomiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxonomies', function($tb){
			$tb->increments('id')->unsigned();
			$tb->string('name', 100);
			$tb->integer('parent_id')->default(0);
			$tb->integer('user_id');
			$tb->boolean('status')->default(false);
			$tb->timestamps();
			$tb->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxonomies');
	}

}
