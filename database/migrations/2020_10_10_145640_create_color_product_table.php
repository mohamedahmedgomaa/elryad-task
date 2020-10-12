<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorProductTable extends Migration {

	public function up()
	{
		Schema::create('color_product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->nullable();
			$table->integer('color_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('color_product');
	}
}