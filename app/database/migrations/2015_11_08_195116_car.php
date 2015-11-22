<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Car extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('showroom_car', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('showroom_car_id');
			$table->integer('showroom_make_id');
			//$table->string('make');
			$table->string('model');
			$table->integer('year');
			$table->string('engine');
			$table->string('transmission');
			$table->string('payment');
			$table->double('price', 15, 3);
			$table->longText('description')->nullable();
			$table->text('contact')->nullable();
			$table->text('working_hours')->nullable();
			$table->tinyInteger('display');// 1 = House display, 2 = maintenance center
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
		Schema::dropIfExists("showroom_car");
	}
}
