<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentHomeworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_homework', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('title');
			$table->bigInteger('teacher_id')->unsigned()->index('student_homework_teacher_id_foreign');
			$table->bigInteger('session_id')->unsigned()->index('student_homework_session_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('student_homework_class_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('student_homework_section_id_foreign');
			$table->bigInteger('subject_id')->unsigned()->index('student_homework_subject_id_foreign');
			$table->date('start_date');
			$table->date('end_date');
			$table->text('description');
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
		Schema::drop('student_homework');
	}

}
