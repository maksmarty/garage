<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneInAPIUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('api_users', function($table)
		{
			$table->string('phone')->after('api_users_id');
			$table->string("last_name")->after('api_users_id');
			$table->string("first_name")->after('api_users_id');
		});


	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('api_users', function($table)
		{
			$table->dropColumn('first_name');
			$table->dropColumn('last_name');
			$table->dropColumn('phone');
		});

	}

}
