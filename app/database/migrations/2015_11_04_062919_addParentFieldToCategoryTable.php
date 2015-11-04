<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentFieldToCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('category', function($table)
		{
			$table->bigInteger('parent')->unsigned()->default('0')->after('name');
		});
	}

	/**
	 * Reverse the migrations.

	 * @return void
	 */
	public function down()
	{
		Schema::table('category', function($table)
		{
			$table->dropColumn('parent');
		});
	}

}
