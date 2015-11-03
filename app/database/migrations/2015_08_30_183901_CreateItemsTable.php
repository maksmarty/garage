<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("items", function($table)
		{
			$table->engine = "InnoDB";

			$table->increments("item_id");
			$table->integer("category_id");
			$table->string("name");
			$table->string("phone");
			$table->longText('description')->nullable();
			$table->string("image")->nullable();
			$table->dateTime("created_at");
			$table->dateTime("updated_at");
			$table->dateTime("deleted_at");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("items");
	}

}
