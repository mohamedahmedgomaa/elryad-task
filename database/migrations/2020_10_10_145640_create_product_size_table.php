<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSizeTable extends Migration {

	public function up()
	{
		Schema::create('product_size', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
//			$table->integer('color_id')->nullable();
			$table->integer('size_id')->nullable();
			$table->integer('product_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('color_size');
	}
}
