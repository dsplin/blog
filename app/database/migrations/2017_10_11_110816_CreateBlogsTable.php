<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {


	public function up()
	{
		Schema::create('blogs', function($table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->text('content');
			$table->integer('user_id')->nullable();
			$table->string('login', 255)->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}
