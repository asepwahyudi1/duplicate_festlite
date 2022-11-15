<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyllabiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('syllabi', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('session_id')->unsigned()->index('syllabi_session_id_foreign');
			$table->bigInteger('exam_id')->unsigned()->index('syllabi_exam_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('syllabi_class_id_foreign');
			$table->bigInteger('subject_id')->unsigned()->index('syllabi_subject_id_foreign');
			$table->string('attachment')->nullable();
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
		Schema::drop('syllabi');
	}

}
