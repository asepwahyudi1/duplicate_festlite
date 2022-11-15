<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('class_id')->unsigned()->index('subjects_class_id_foreign');
			$table->integer('code');
			$table->string('name');
			$table->string('image')->nullable();
			$table->enum('type', array('theory','practical'))->default('theory');
			$table->boolean('is_optional')->default(0);
			$table->integer('total_marks')->default(100);
			$table->integer('pass_marks')->default(40);
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects');
	}

}
