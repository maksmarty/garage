<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFromMobile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_mobile', function(Blueprint $table)
		{
			$table->increments('user_mobile_id');
			$table->string("phone");
			$table->tinyInteger('max_number_post');
			$table->tinyInteger('number_post_today')->default('0');
			$table->date('last_post_date');
			$table->tinyInteger('status')->unsigned()->default('0');//1= Active
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_mobile');
	}


}
