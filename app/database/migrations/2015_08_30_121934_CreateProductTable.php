<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	public function up()
	{
		Schema::create("product", function($table)
		{
			$table->engine = "InnoDB";

			$table->increments("product_id");
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

	public function down()
	{
		Schema::dropIfExists("product");
	}

}
