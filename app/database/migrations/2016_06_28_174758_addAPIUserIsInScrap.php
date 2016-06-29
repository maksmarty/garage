<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAPIUserIsInScrap extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('scrap', function($table)
		{
			$table->bigInteger("api_users_id")->unsigned()->after('user_scrap_id');
		});


	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('scrap', function($table)
		{
			$table->dropColumn('api_users_id');
		});

	}

}
