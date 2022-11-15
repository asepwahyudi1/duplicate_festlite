<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->index('staff_user_id_foreign');
			$table->bigInteger('department_id')->unsigned()->nullable()->index('staff_department_id_foreign');
			$table->enum('designation', array('teacher','accountant'));
			$table->date('joining_date');
			$table->string('phone');
			$table->enum('gender', array('male','female','other'));
			$table->enum('religion', array('muslim','hindu','buddha','christian'))->nullable();
			$table->text('bio')->nullable();
			$table->text('present_address')->nullable();
			$table->text('permanent_address')->nullable();
			$table->string('joining_letter')->nullable();
			$table->string('resume')->nullable();
			$table->timestamps(10);
			$table->integer('roll_no')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff');
	}

}
