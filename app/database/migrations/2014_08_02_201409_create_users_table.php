<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('displayname',50);
			$table->string('username',50);
			$table->string('email',150);
			$table->string('password',80);
			$table->string('temp_password',80);
			$table->rememberToken();
			$table->string('resetcode',100);
			$table->string('access',50);
			$table->string('active',5);
			$table->string('isdel',5);
			$table->timestamp('last_login');
			$table->timestamps();

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
