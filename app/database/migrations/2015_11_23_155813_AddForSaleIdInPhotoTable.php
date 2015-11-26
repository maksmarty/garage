<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForSaleIdInPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photo', function($table)
		{
			$table->bigInteger('forsale_id')->unsigned()->nullable()->after('showroom_car_id');
		});
	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('photo', function($table)
		{
			$table->dropColumn('forsale_id');
		});
	}

}
