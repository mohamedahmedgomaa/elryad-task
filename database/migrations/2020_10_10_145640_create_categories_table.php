<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar')->nullable();
			$table->string('name_en')->nullable();
			$table->string('description_ar')->nullable();
			$table->string('description_en')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}