<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAPIUserIsInAccessories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accessories', function($table)
		{
			$table->bigInteger("api_users_id")->unsigned()->after('user_accessories_id');
		});


	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('accessories', function($table)
		{
			$table->dropColumn('api_users_id');
		});

	}

}
