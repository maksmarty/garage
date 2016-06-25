<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToShowRoom extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::table('showroom_car', function($table)
//		{
//			$table->string('phone')->nullable()->after('contact');
//			$table->tinyInteger('is_processed')->unsigned()->default('0');
//		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::table('showroom_car', function($table)
//		{
//			$table->dropColumn('phone');
//			$table->dropColumn('is_processed');
//		});
	}


}
