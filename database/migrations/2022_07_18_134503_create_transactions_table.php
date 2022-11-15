<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('transaction_no');
			$table->bigInteger('session_id')->unsigned()->nullable()->index('transactions_session_id_foreign');
			$table->bigInteger('student_id')->unsigned()->nullable()->index('transactions_student_id_foreign');
			$table->string('income_type')->nullable();
			$table->string('expense_type')->nullable();
			$table->string('payment_type')->nullable();
			$table->string('amount');
			$table->enum('type', array('income','expense'));
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
		Schema::drop('transactions');
	}

}
