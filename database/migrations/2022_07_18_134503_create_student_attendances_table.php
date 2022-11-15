<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_attendances', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('student_id')->unsigned()->index('student_attendances_student_id_foreign');
			$table->bigInteger('session_id')->unsigned()->index('student_attendances_session_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('student_attendances_class_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('student_attendances_section_id_foreign');
			$table->date('date');
			$table->boolean('status')->default(0);
			$table->timestamps(10);
			$table->time('time')->nullable();
			$table->string('type')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_attendances');
	}

}
