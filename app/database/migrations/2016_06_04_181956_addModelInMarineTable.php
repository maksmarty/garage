<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModelInMarineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marine', function($table)
		{
			$table->string("model")->nullable()->after('user_marine_id');
		});

		//ALTER TABLE `forsale` CHANGE `price` `price` VARCHAR(30) NULL;
		//DB::query('ALTER TABLE `forsale` CHANGE `price` `price` VARCHAR(30) NULL;');

	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('marine', function($table)
		{
			$table->dropColumn('model');
		});

		//ALTER TABLE `forsale` CHANGE `price` `price` DOUBLE(15,3) NOT NULL;
		//DB::query('ALTER TABLE `forsale` CHANGE `price` `price` DOUBLE(15,3) NOT NULL;');
	}

}
