<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentToShowroomCar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('showroom_car', function($table)
		{
			$table->bigInteger('parent_model')->unsigned()->nullable()->default('0')->after('display');
			$table->tinyInteger('hasChild')->unsigned()->nullable()->default('0')->after('parent_model');
		});
	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('showroom_car', function($table)
		{
			$table->dropColumn('parent_model');
			$table->dropColumn('hasChild');
		});
	}


}
