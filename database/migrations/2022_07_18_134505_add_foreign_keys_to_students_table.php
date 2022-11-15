<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('parent_id')->references('id')->on('guardians')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('section_id')->references('id')->on('sections')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function(Blueprint $table)
		{
			$table->dropForeign('students_class_id_foreign');
			$table->dropForeign('students_parent_id_foreign');
			$table->dropForeign('students_section_id_foreign');
			$table->dropForeign('students_session_id_foreign');
			$table->dropForeign('students_user_id_foreign');
		});
	}

}
