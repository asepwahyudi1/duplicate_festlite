<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_routines', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('session_id')->unsigned()->index('class_routines_session_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('class_routines_class_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('class_routines_section_id_foreign');
			$table->bigInteger('class_room_id')->unsigned()->index('class_routines_class_room_id_foreign');
			$table->bigInteger('teacher_id')->unsigned()->index('class_routines_teacher_id_foreign');
			$table->bigInteger('subject_id')->unsigned()->index('class_routines_subject_id_foreign');
			$table->integer('weekday');
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
		Schema::drop('class_routines');
	}

}
