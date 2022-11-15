<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fees', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('type_id')->unsigned()->index('fees_type_id_foreign');
			$table->bigInteger('session_id')->unsigned()->index('fees_session_id_foreign');
			$table->bigInteger('class_id')->unsigned()->index('fees_class_id_foreign');
			$table->bigInteger('section_id')->unsigned()->index('fees_section_id_foreign');
			$table->bigInteger('student_id')->unsigned()->index('fees_student_id_foreign');
			$table->bigInteger('parent_id')->unsigned()->index('fees_parent_id_foreign');
			$table->float('amount');
			$table->date('due_date');
			$table->date('pay_date')->nullable();
			$table->boolean('status')->default(1);
			$table->text('description')->nullable();
			$table->string('transaction_no')->nullable();
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
		Schema::drop('fees');
	}

}
