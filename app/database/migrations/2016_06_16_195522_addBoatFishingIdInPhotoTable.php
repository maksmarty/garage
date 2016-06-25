<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoatFishingIdInPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photo', function($table)
		{
			$table->bigInteger('boat_fishing_id')->unsigned()->nullable()->after('accessories_id');
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
			$table->dropColumn('boat_fishing_id');
		});
	}


}
