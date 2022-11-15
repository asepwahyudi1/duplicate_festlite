<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('messageable_type');
			$table->bigInteger('messageable_id')->unsigned();
			$table->enum('message_type', array('email','sms'));
			$table->text('message');
			$table->timestamps(10);
			$table->index(['messageable_type','messageable_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}
