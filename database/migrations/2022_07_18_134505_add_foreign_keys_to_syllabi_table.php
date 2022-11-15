<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSyllabiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('syllabi', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('exam_id')->references('id')->on('exams')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('syllabi', function(Blueprint $table)
		{
			$table->dropForeign('syllabi_class_id_foreign');
			$table->dropForeign('syllabi_exam_id_foreign');
			$table->dropForeign('syllabi_session_id_foreign');
			$table->dropForeign('syllabi_subject_id_foreign');
		});
	}

}
