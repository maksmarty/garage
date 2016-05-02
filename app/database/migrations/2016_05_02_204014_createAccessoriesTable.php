<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accessories', function(Blueprint $table)
		{
			$table->increments('accessories_id');
			$table->integer('accessories_make_region_id');
			$table->integer('user_accessories_id')->nullable();
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
		Schema::dropIfExists('accessories');
	}

}
