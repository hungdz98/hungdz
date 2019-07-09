<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders_products', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->BigInteger('order_id')->unsigned()->nullable();
			$table->string('product_id')->nullable();
			$table->string('product_name');
			$table->string('product_color');
			$table->string('product_size');
			$table->string('product_price');
			$table->integer('product_qty')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orders_products');
	}
}
