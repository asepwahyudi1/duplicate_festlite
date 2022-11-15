<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teacher_attendances', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('teacher_id')->unsigned()->index('teacher_attendances_teacher_id_foreign');
			$table->bigInteger('session_id')->unsigned()->index('teacher_attendances_session_id_foreign');
			$table->boolean('status')->default(0);
			$table->date('date');
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
		Schema::drop('teacher_attendances');
	}

}
