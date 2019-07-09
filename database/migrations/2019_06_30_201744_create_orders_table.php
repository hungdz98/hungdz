<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->BigInteger('user_id')->unsigned();
			$table->string('user_email');
			$table->string('name');
			$table->string('address');
			$table->string('mobile');
			$table->string('payment_method');
			$table->string('shipping_charges')->default('free');
			$table->string('grand_total');
			$table->string('order_status')->default('new');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orders');
	}
}
