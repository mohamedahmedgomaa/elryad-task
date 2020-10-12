<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorsTable extends Migration {

	public function up()
	{
		Schema::create('colors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar')->nullable();
			$table->string('name_en')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('colors');
	}
}