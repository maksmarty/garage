<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMarineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_marine', function(Blueprint $table)
		{
			$table->increments('user_marine_id');
			$table->string("uuid");
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
		Schema::dropIfExists('user_marine');
	}

}
