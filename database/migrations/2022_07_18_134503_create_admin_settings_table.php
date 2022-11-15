<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_settings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->text('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('favicon')->nullable();
			$table->string('logo')->nullable();
			$table->string('dark_logo')->nullable();
			$table->timestamps(10);
			$table->string('sidebar_bg')->default('#232e3c');
			$table->string('navbar_bg')->default('#fff');
			$table->string('sidebar_text_color')->default('#232e3c');
			$table->string('navbar_text_color')->default('#232e3c');
			$table->enum('layout', array('full-width','boxed'))->default('full-width');
			$table->enum('nav_position', array('top','left','right'))->default('left');
			$table->bigInteger('default_session_id')->unsigned()->nullable()->index('admin_settings_default_session_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_settings');
	}

}
