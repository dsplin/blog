<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('login', 255);
			$table->string('password', 255);
			$table->rememberToken();
			$table->timestamps();
		});
	}



	public function down()
	{
		Schema::drop('users');
	}

}
