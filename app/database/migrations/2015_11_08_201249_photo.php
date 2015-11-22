<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo', function(Blueprint $table)
		{
			$table->engine = "InnoDB";

			$table->increments('photo_id');
			$table->integer('showroom_car_id');
			$table->string('photo_name');
			$table->tinyInteger('default')->unsigned()->default('0');// 0 = no, 1 = yes
			//$table->string('slug');
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
		Schema::dropIfExists("photo");
	}

}
