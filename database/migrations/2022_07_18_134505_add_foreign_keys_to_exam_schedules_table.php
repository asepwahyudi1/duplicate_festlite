<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToExamSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exam_schedules', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('exam_id')->references('id')->on('exams')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('room_id')->references('id')->on('class_rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('section_id')->references('id')->on('sections')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exam_schedules', function(Blueprint $table)
		{
			$table->dropForeign('exam_schedules_class_id_foreign');
			$table->dropForeign('exam_schedules_exam_id_foreign');
			$table->dropForeign('exam_schedules_room_id_foreign');
			$table->dropForeign('exam_schedules_section_id_foreign');
			$table->dropForeign('exam_schedules_session_id_foreign');
			$table->dropForeign('exam_schedules_subject_id_foreign');
		});
	}

}
