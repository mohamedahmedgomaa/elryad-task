<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSizesTable extends Migration {

	public function up()
	{
		Schema::create('sizes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar')->nullable();
			$table->string('name_en')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('sizes');
	}
}