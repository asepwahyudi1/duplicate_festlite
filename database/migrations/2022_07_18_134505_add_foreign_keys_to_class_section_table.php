<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassSectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('class_section', function(Blueprint $table)
		{
			$table->foreign('class_id')->references('id')->on('classses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('section_id')->references('id')->on('sections')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('class_section', function(Blueprint $table)
		{
			$table->dropForeign('class_section_class_id_foreign');
			$table->dropForeign('class_section_section_id_foreign');
		});
	}

}
