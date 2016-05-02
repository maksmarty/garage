<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSparePartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spare_part', function(Blueprint $table)
		{
			$table->increments('spare_part_id');
			$table->integer('showroom_make_id');
			$table->string('branch_name')->nullable();
			$table->string('phone')->nullable();
			$table->string('internal_phone')->nullable();
			$table->text('address')->nullable();
			$table->text('working_time')->nullable();
			$table->tinyInteger('status')->unsigned()->default('1');
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
		Schema::dropIfExists("spare_part");
	}

}
