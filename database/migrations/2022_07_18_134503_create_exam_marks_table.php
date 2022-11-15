<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_marks', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('session_id')->unsigned()->nullable()->index('exam_marks_session_id_foreign');
			$table->bigInteger('exam_id')->unsigned()->index('exam_marks_exam_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('exam_marks_class_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('exam_marks_section_id_foreign');
			$table->bigInteger('subject_id')->unsigned()->index('exam_marks_subject_id_foreign');
			$table->bigInteger('roll_no')->unsigned();
			$table->bigInteger('mark')->unsigned()->default(0);
			$table->text('note')->nullable();
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
		Schema::drop('exam_marks');
	}

}
