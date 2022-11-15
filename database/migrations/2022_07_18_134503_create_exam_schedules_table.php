<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_schedules', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('session_id')->unsigned()->index('exam_schedules_session_id_foreign');
			$table->bigInteger('exam_id')->unsigned()->index('exam_schedules_exam_id_foreign');
			$table->bigInteger('room_id')->unsigned()->index('exam_schedules_room_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('exam_schedules_class_id_foreign');
			$table->bigInteger('subject_id')->unsigned()->index('exam_schedules_subject_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('exam_schedules_section_id_foreign');
			$table->date('exam_date');
			$table->time('start_time');
			$table->time('end_time');
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
		Schema::drop('exam_schedules');
	}

}
