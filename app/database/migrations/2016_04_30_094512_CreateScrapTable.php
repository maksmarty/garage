<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scrap', function(Blueprint $table)
		{
			$table->increments('scrap_id');
			$table->integer('make_region_id');
			$table->integer('user_scrap_id')->nullable();
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
		Schema::dropIfExists('scrap');
	}

}
