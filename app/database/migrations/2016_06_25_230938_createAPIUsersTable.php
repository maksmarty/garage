<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAPIUsersTable extends Migration {

	public function up()
	{
//		Schema::create('api_users', function(Blueprint $table)
//		{
//			$table->increments('api_users_id');
//			$table->string("email");
//			$table->string('password');
//			$table->string('verification_code')->nullable();
//			$table->string('token')->nullable();
//			$table->enum('is_active', array('0', '1'));
//			$table->timestamps();
//
//		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('api_users');
	}


}
