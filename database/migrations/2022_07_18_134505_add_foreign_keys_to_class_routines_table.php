<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassRoutinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('class_routines', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('class_room_id')->references('id')->on('class_rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('section_id')->references('id')->on('sections')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('teacher_id')->references('id')->on('staff')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('class_routines', function(Blueprint $table)
		{
			$table->dropForeign('class_routines_class_id_foreign');
			$table->dropForeign('class_routines_class_room_id_foreign');
			$table->dropForeign('class_routines_section_id_foreign');
			$table->dropForeign('class_routines_session_id_foreign');
			$table->dropForeign('class_routines_subject_id_foreign');
			$table->dropForeign('class_routines_teacher_id_foreign');
		});
	}

}
