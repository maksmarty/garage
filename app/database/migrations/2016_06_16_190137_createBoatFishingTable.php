<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoatFishingTable extends Migration {

	public function up()
	{
		Schema::create('boat_fishing', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('boat_fishing_id');
			$table->longText('description')->nullable();
			$table->string('phone');
			$table->text('contact')->nullable();
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
		Schema::dropIfExists("boat_fishing");
	}

}
