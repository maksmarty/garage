<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAPIUserIsInUserMarine extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_marine', function($table)
		{
			$table->bigInteger("api_users_id")->unsigned()->after('user_marine_id');
		});


	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('user_marine', function($table)
		{
			$table->dropColumn('api_users_id');
		});

	}

}
