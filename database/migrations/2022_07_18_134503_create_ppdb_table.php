<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpdbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppdb', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_name');
			$table->string('student_email');
			$table->string('address');
			$table->string('father_name');
			$table->string('mother_name');
			$table->string('phone');
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
		Schema::drop('ppdb');
	}

}
