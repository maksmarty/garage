<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceCenterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_center', function(Blueprint $table)
		{
			$table->increments('service_center_id');
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
		Schema::dropIfExists("service_center");
	}

}
