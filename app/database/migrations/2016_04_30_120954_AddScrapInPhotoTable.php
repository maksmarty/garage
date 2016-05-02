<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScrapInPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photo', function($table)
		{
			$table->bigInteger('scrap_id')->unsigned()->nullable()->after('forsale_id');
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
			$table->dropColumn('scrap_id');
		});
	}

}
