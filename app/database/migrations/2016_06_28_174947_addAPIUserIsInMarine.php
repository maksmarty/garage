<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAPIUserIsInMarine extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marine', function($table)
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
		Schema::table('marine', function($table)
		{
			$table->dropColumn('api_users_id');
		});

	}

}
