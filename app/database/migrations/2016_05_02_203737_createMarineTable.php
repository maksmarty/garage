<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marine', function(Blueprint $table)
		{
			$table->increments('marine_id');
			$table->integer('marine_make_region_id');
			$table->integer('user_marine_id')->nullable();
			$table->string("title");
			$table->string("phone");
			$table->double('price', 15, 3);
			$table->longText('description')->nullable();
			$table->tinyInteger('status')->unsigned()->default('0');
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
		Schema::dropIfExists('marine');
	}

}
