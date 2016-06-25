<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarienAndAccessoriesInPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photo', function($table)
		{
			$table->bigInteger('marine_id')->unsigned()->nullable()->after('scrap_id');
			$table->bigInteger('accessories_id')->unsigned()->nullable()->after('marine_id');
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
			$table->dropColumn('marine_id');
			$table->dropColumn('accessories_id');
		});
	}

}
