<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('users', function($tb) {
      $tb->increments('id')->unsigned();
      $tb->string('username', 128);
      $tb->string('password', 64);
      $tb->boolean('status')->default(false);
      $tb->timestamp('last_login')->nullable();
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
		Schema::drop('users');
	}

}
