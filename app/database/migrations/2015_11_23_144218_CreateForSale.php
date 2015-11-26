<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForSale extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forsale', function(Blueprint $table)
		{
			$table->increments('forsale_id');
			$table->integer('make_id');
			$table->integer('user_mobile_id')->nullable();
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
		Schema::drop('forsale');
	}



}
