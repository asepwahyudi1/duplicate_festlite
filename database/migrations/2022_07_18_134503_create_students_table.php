<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->index('students_user_id_foreign');
			$table->bigInteger('session_id')->unsigned()->index('students_session_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('students_class_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('students_section_id_foreign');
			$table->bigInteger('parent_id')->unsigned()->index('students_parent_id_foreign');
			$table->integer('roll_no')->unsigned();
			$table->date('admission_date')->nullable();
			$table->text('present_address')->nullable();
			$table->text('permanent_address')->nullable();
			$table->enum('gender', array('male','female','other'))->nullable();
			$table->date('date_of_birth')->nullable();
			$table->enum('blood_group', array('A+','A-','B+','B-','O+','O-','AB+','AB-'))->nullable();
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
		Schema::drop('students');
	}

}
