<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fees', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('parent_id')->references('id')->on('guardians')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('section_id')->references('id')->on('sections')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('type_id')->references('id')->on('fee_types')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fees', function(Blueprint $table)
		{
			$table->dropForeign('fees_class_id_foreign');
			$table->dropForeign('fees_parent_id_foreign');
			$table->dropForeign('fees_section_id_foreign');
			$table->dropForeign('fees_session_id_foreign');
			$table->dropForeign('fees_student_id_foreign');
			$table->dropForeign('fees_type_id_foreign');
		});
	}

}
