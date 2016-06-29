<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAPIUserIsInForsale extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forsale', function($table)
		{
			$table->bigInteger("api_users_id")->unsigned()->after('user_mobile_id');
		});


	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('forsale', function($table)
		{
			$table->dropColumn('api_users_id');
		});

	}

}
