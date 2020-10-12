<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->longText('description');
			$table->string('price');
			$table->string('offer')->nullable();
			$table->integer('qty');
			$table->string('image')->nullable();
			$table->integer('category_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}