<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarWashTable extends Migration {

	public function up()
	{
		Schema::create('car_wash', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('car_wash_id');
			$table->string('name');
			$table->string('description');
			$table->string('phone');
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
		Schema::dropIfExists("car_wash");
	}
}
