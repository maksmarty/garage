<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusWarrantyInShowroom extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('showroom_car', function($table)
		{
			$table->text('warranty')->nullable()->after('working_hours');
			$table->tinyInteger('status')->unsigned()->default('1')->after('hasChild');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('showroom_car', function($table)
		{
			$table->dropColumn('warranty');
			$table->dropColumn('status');
		});
	}

}
