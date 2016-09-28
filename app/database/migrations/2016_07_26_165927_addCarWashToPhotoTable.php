<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarWashToPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photo', function($table)
		{
			$table->bigInteger('car_wash_id')->unsigned()->nullable()->after('boat_fishing_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photo', function($table)
		{
			$table->dropColumn('car_wash_id');
		});
	}
}
