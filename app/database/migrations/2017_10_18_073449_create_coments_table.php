<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentsTable extends Migration {


	public function up()
	{
		Schema::create('coments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('coment');
			$table->integer('user_id');
			$table->integer('post_id');
			$table->foreign('post_id')->references('id')->on('blogs');
			$table->rememberToken();
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('coments');
	}

}
