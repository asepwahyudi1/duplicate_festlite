<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentHomeworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_homework', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('section_id')->references('id')->on('sections')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('teacher_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_homework', function(Blueprint $table)
		{
			$table->dropForeign('student_homework_class_id_foreign');
			$table->dropForeign('student_homework_section_id_foreign');
			$table->dropForeign('student_homework_session_id_foreign');
			$table->dropForeign('student_homework_subject_id_foreign');
			$table->dropForeign('student_homework_teacher_id_foreign');
		});
	}

}
